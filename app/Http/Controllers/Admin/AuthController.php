<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AuthController extends Controller
{
 
    public function showLoginForm()
    {

        return view('admin.login');
    }

    public function login(Request $request)
   {


        if (auth('web')->check()) {
            auth('web')->logout();
        }

        if (auth('employer')->check()) {
            auth('employer')->logout();
        }


    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:4',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'redirect' => route('admin.dashboard'),
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Invalid email or password.',
    ], 401);
    
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


}
