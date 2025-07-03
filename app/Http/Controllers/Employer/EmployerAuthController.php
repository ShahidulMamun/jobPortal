<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerAuthController extends Controller
{
     
    public function showRegisterForm(){

        return view('employer.register-form');
    }


    public function register(Request $request)
    {

    $request->validate([
        'name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employers,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $employer = Employer::create([
        'name' => $request->name,
        'company_name' => $request->company_name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    auth()->guard('employer')->login($employer);

    return redirect()->route('employer.dashboard');
    }

    
     public function showLoginForm()
    {
        return view('employer.login');
    }

    public function login(Request $request)
    {
        
        if (auth('web')->check() || auth('admin')->check()) {
            auth()->logout(); 
        }

        $credentials = $request->only('email', 'password');

        if (auth()->guard('employer')->attempt($credentials)) {
            return redirect()->route('employer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function dashboard()
    {
        return view('employer.dashboard');
    }


    public function logout(Request $request)
    {
        auth()->guard('employer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employer.login');
    }
}
