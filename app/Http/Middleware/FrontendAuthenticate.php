<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontendAuthenticate
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check login
        if (!session()->has('auth_token') || !session()->has('user_id')) {

            return redirect('/login')
                ->withErrors([
                    'error' => 'Please login first'
                ]);
        }

        // Check role access
        if (!empty($roles)) {

            $role = session('role_name');

            if (!in_array($role, $roles)) {

                abort(403, 'Unauthorized Access');
            }
        }

        return $next($request);
    }
}