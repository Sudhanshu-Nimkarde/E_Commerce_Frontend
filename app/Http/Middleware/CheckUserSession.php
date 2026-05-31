<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        /*
        |--------------------------------------------------------------------------
        | Check Session
        |--------------------------------------------------------------------------
        */

        if (
            !session()->has('auth_token') ||
            !session()->has('user_id')
        ) {

            return redirect('/login')
                ->withErrors([
                    'error' => 'Please login first'
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Optional Role Check
        |--------------------------------------------------------------------------
        */

        if (!empty($roles)) {

            $sessionRole = session('role_name');

            if (!in_array($sessionRole, $roles)) {

                abort(403, 'Unauthorized Access');
            }
        }

        return $next($request);
    }
}