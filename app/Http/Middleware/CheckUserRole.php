<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated.
        // If not, redirect them to the login page.
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Now, check if the authenticated user has the Admin role_id (which is 1).
        // If their role_id is NOT 1, they are not an admin and should be redirected.
        if (Auth::user()->role_id !== 1) { // Changed from 2 to 1 (Admin role)
            // Redirect non-admin users to the home page (or a general user dashboard if one exists).
            // This is a safe default to avoid errors if specific admin routes aren't accessible.
            return redirect('/')->with('error', 'You do not have permission to access this admin content.');
        }

        // If the user is authenticated and has the correct admin role_id, allow them to proceed.
        return $next($request);
    }
}
