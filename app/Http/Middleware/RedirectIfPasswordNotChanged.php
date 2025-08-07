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
        // If the user is authenticated and their password needs to be changed
        // and they are NOT already on the password change form itself,
        // redirect them to the password change form.
        if (Auth::check() && Auth::user()->must_change_password && !$request->routeIs('password.change.form')) {
            // Also ensure they are not trying to logout, as that should always be allowed
            if (!$request->routeIs('logout')) { // Assuming you have a 'logout' route
                return redirect()->route('password.change.form')->with('warning', 'Please change your temporary password to continue.');
            }
        }

        return $next($request);
    }
}
