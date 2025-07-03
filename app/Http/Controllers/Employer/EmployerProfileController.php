<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'company_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
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
}
