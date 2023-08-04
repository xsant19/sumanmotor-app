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

    protected function redirectTo(Request $request): ?string
    {
        if (auth()->user()) {
            $role_id = auth()->user()->role_id;
            if ($role_id == 1 || $role_id == 3) {
                return '/dashboard-admin'; // Redirect to admin dashboard
            } else {
                return '/dashboard-pelanggan'; // Redirect to customer dashboard
            }
        }

        // If not authenticated, redirect to the login page
        return route('login');
    }
}
