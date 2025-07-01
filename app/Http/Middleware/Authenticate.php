<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // admin panel route 
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            if ($request->is('employeer') || $request->is('employeer/*')) {
                return route('employeer.login');
            }

            //default user login page
            return route('login');
        }
    }
}
