<?php

namespace App\Http\Controllers\Employeer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employeer;

class EmployeerAuthController extends Controller
{
     
    public function showRegisterForm(){

        return view('employeer.register-form');
    }


    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employeers,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $employer = Employeer::create([
        'name' => $request->name,
        'company_name' => $request->company_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    auth()->guard('employeer')->login($employer);

    return redirect()->route('employeer.dashboard');
    }


    
     public function showLoginForm()
    {
        return view('employeer.login');
    }

    public function login(Request $request)
    {
        
        if (auth('web')->check() || auth('admin')->check()) {
            auth()->logout(); 
        }

        $credentials = $request->only('email', 'password');

        if (auth()->guard('employeer')->attempt($credentials)) {
            return redirect()->route('employeer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function dashboard()
    {
        return view('employeer.dashboard');
    }


    public function logout(Request $request)
    {
        auth()->guard('employeer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employeer.login');
    }
}
