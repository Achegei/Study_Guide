<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfPasswordNotChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define the routes that should be allowed when a password change is required.
        $allowedRoutes = ['password.change.form', 'password.update.custom'];

        // If the user is authenticated and their password needs to be changed,
        // and the current route is NOT one of the allowed routes, redirect them.
        if (Auth::check() && Auth::user()->must_change_password && !$request->routeIs(...$allowedRoutes)) {
            // Also ensure they are not trying to logout, as that should always be allowed
            if (!$request->routeIs('logout')) {
                return redirect()->route('password.change.form')->with('warning', 'Please change your temporary password to continue.');
            }
        }

        return $next($request);
    }
}
