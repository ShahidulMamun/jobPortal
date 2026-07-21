<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $profile = User::where('id', $user->id)->first();
        $experiences = Experience::where('user_id', $user->id)->get();
        $education = Education::where('user_id', $user->id)->get();

        return view('candidate.profile',compact('user','profile','experiences','education'));
      }

    
    //Update the user's profile information.
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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
