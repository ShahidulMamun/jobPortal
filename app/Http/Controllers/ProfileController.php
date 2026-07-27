<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
   
    //Display the user's profile form.
    public function candidateProfile()
      {
        $user = auth()->user();
        $experiences = Experience::where('user_id', $user->id)->get();
        $education = Education::where('user_id', $user->id)->get();

        return view('candidate.profile',compact('user','experiences','education'));
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
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => (['nullable', 'string', 'max:255',Rule::unique('users', 'user_name')->ignore($userId)]),
            'email' => (['required', 'string', 'email', 'max:255',Rule::unique('users', 'email')->ignore($userId)]),
            'designation' => ['nullable', 'string', 'max:255'],
            'phone' => (['nullable', 'string', 'max:20',Rule::unique('users', 'phone')->ignore($userId)]),
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'experience_level' => ['nullable', 'string', 'max:100'],
            'skills' => ['nullable'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'state_id' => ['nullable', 'exists:states,id'],
            'district_id' => ['nullable', 'exists:districts,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'resume' => ['nullable', 'mimes:pdf,doc,docx', 'max:5120'],
            'bio' => ['nullable', 'string'],
            'timezone' => ['nullable', 'timezone'],
            'status' => ['nullable', 'in:pending,active,inactive,suspended,banned'],
       
                

          ]);

    //    dd($validated);
        
        $user = $request->user();
       
        // validated data model-এ assign
        $user->fill($validated);
      
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

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
