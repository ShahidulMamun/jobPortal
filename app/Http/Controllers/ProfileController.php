<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use Illuminate\View\View;

class ProfileController extends Controller
{
   
    //Display the user's profile form.
    public function candidateProfile()
      {
        $user = auth()->user();
        $experiences = Experience::where('user_id', $user->id)->get();
        $education = Education::where('user_id', $user->id)->get();
        
         $countries = Country::where('status', 1)->orderBy('name')->get();
         $states = State::where('status', 1)->orderBy('name')->get();
         $districts = District::where('status', 1)->orderBy('name')->get();
         $cities = City::where('status', 1)->orderBy('name')->get();

        return view('candidate.profile',compact('user','experiences','education','countries','states','districts','cities'));
      }

    
    //Update the user's profile information.
    
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('candidate.profile')->with('status', 'profile-updated');
    // }
    
 public function update(Request $request)
    {
        $userId = $request->user()->id;
 
        $validated = $request->validate([
            'full_name'        => ['required', 'string', 'max:255'],
            'user_name'        => ['nullable', 'string', 'max:255', Rule::unique('users', 'user_name')->ignore($userId)],
            'email'            => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'designation'      => ['nullable', 'string', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:20', Rule::unique('users', 'phone')->ignore($userId)],
            'photo'            => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'experience_level' => ['nullable', 'string', 'max:100'],
            'skills'           => ['nullable'],
            'country_id'       => ['nullable', 'exists:countries,id'],
            'state_id'         => ['nullable', 'exists:states,id'],
            'district_id'      => ['nullable', 'exists:districts,id'],
            'city_id'          => ['nullable', 'exists:cities,id'],
            'resume'           => ['nullable', 'mimes:pdf,doc,docx', 'max:5120'],
            'bio'              => ['nullable', 'string'],
            'linkedin_url'     => ['nullable', 'string'],
            'github_url'       => ['nullable', 'string'],
            'portfolio_url'    => ['nullable', 'string'],
            'timezone'         => ['nullable', 'timezone'],
            'status'           => ['nullable', 'in:pending,active,inactive,suspended,banned'],
 
            // ---------- Work Experience ----------
            'experience'                     => ['nullable', 'array'],
            'experience.*.job_title'         => ['nullable', 'string', 'max:255'],
            'experience.*.company_name'      => ['nullable', 'string', 'max:255'],
            'experience.*.start_date'        => ['nullable', 'date'],
            'experience.*.end_date'          => ['nullable', 'date', 'after_or_equal:experience.*.start_date'],
            'experience.*.current'           => ['nullable', 'boolean'],
            'experience.*.description'       => ['nullable', 'string'],
 
            // ---------- Education ----------
            'education'                     => ['nullable', 'array'],
            'education.*.degree'            => ['nullable', 'string', 'max:255'],
            'education.*.institution'       => ['nullable', 'string', 'max:255'],
            'education.*.start_year'        => ['nullable', 'digits:4', 'integer', 'min:1950'],
            'education.*.end_year'          => ['nullable', 'digits:4', 'integer', 'gte:education.*.start_year'],
        ]);
 
        $user = $request->user();
 
        // These are handled separately below, not mass-assigned onto the user row
        $experienceRows = $validated['experience'] ?? [];
        $educationRows  = $validated['education'] ?? [];
        unset($validated['experience'], $validated['education'], $validated['photo'], $validated['resume']);
 
        // ---------- Skills: normalize to JSON string for storage ----------
        if (array_key_exists('skills', $validated)) {
            $skills = $validated['skills'];
            $validated['skills'] = is_array($skills) ? json_encode(array_values(array_filter($skills))) : $skills;
        }
 
        // ---------- Photo upload ----------
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $validated['photo'] = $request->file('photo')->store('candidates/photos', 'public');
        }
 
        // ---------- Resume upload ----------
        if ($request->hasFile('resume')) {
            if ($user->resume) {
                Storage::disk('public')->delete($user->resume);
            }
            $validated['resume'] = $request->file('resume')->store('candidates/resumes', 'public');
            $validated['resume_uploaded_at'] = now();
        }
 
        // validated data model-এ assign
        $user->fill($validated);
 
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
 
        $user->save();
 
        // ---------- Sync work experience (replace all with submitted rows) ----------
        $user->experiences()->delete();
        foreach ($experienceRows as $row) {
            if (empty($row['job_title']) && empty($row['company_name'])) {
                continue; // skip fully empty rows added/removed client-side
            }
 
            Experience::create([
                'user_id'      => $user->id,
                'job_title'    => $row['job_title'] ?? null,
                'company_name' => $row['company_name'] ?? null,
                'start_date'   => $row['start_date'] ?? null,
                'end_date'     => ! empty($row['current']) ? null : ($row['end_date'] ?? null),
                'current'      => ! empty($row['current']),
                'description'  => $row['description'] ?? null,
            ]);
        }
 
        // ---------- Sync education (replace all with submitted rows) ----------
        $user->educations()->delete();
        foreach ($educationRows as $row) {
            if (empty($row['degree']) && empty($row['institution'])) {
                continue;
            }
 
            Education::create([
                'user_id'     => $user->id,
                'degree'      => $row['degree'] ?? null,
                'institution' => $row['institution'] ?? null,
                'start_year'  => $row['start_year'] ?? null,
                'end_year'    => $row['end_year'] ?? null,
            ]);
        }
 
        return Redirect::route('candidate.profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
