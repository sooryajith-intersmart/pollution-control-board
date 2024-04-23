<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->is('b3-macbis-admin-portal') || $request->is('b3-macbis-admin-portal/*')) {
            return $request->expectsJson() ? null : route('admin.login.form');
        } else {
            return $request->expectsJson() ? null : route('home');
        }
    }
}
