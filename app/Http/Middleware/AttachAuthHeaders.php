<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AttachAuthHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('auth_token') && session()->has('user_id')) {
            // You can share the headers globally or attach when calling Http
            Http::macro('withAuth', function () {
                return Http::withHeaders([
                    'auth-token' => session('auth_token'),
                    'user-id'    => session('user_id'),
                ]);
            });
        }

        return $next($request);
    }
}
