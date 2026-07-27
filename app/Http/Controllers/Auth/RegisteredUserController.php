<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Traits\HasMathCaptcha;

class RegisteredUserController extends Controller
{
    use HasMathCaptcha;

    public function create(): View
    {
      $captcha = $this->generateCaptcha(); 
      
        return view('auth.register', [
            'captchaNum1' => $captcha['num1'],
            'captchaNum2' => $captcha['num2'],
        ]);
   
     }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


      if (! $this->verifyCaptcha($request->captcha_answer)) {
                   return back()
                       ->withErrors(['captcha_answer' => 'ক্যাপচা উত্তর ভুল, আবার চেষ্টা করুন।  '])
                       ->withInput($request->except('password', 'password_confirmation'));
      }
    //  return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        

        $user = User::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

         return redirect()->route('candidate.dashboard')
        ->with('success', 'Registration successful');

    }
}
