<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Auth;

class EmployerProfileController extends Controller
{
     public function edit()
    {
        return view('employer.profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth('employer')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                 Rule::unique('employers')
                 ->whereNull('deleted_at')
                 ->ignore(Auth::guard('employer')->user()->id)
            ],
            'company_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
          ]);

        $user->update([
            'name'         => $request->name,
            'company_name' => $request->company_name,
            'phone'        => $request->phone,
            'designation'  =>$request->designation,
            'company_address'=>$request->company_address,
            'company_website'=>$request->company_website,
            'company_description'=>$request->company_description,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function editPassword()
    {
        return view('employer.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth('employer')->user();


        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {

            
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = $request->new_password; // Mutator will auto hash
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function employerPhotoUpload(Request $request){
       
        // return $request->all();
        $request->validate(['photo'=>'required|image|mimes:jpeg,png,jpg|max:2048']);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            // Delete old photo if exists
            if (Auth::guard('employer')->user()->photo && \Storage::disk('public')->exists(Auth::guard('employer')->user()->photo)) {
                \Storage::disk('public')->delete(Auth::guard('employer')->user()->photo);
            }


            // Store in storage/app/public/photos
             $path = $request->file('photo')->store('photos', 'public');

            // If saving to DB:
              $employer = Auth::guard('employer')->user();
              $employer->photo = $path;
              $employer->save();

            return back()->with('success', 'Photo uploaded!')->with('path', $path);
        }

    }
}
