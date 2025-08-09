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
        // Check if the user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to the login page
            // Adjust 'login' route name if your login route is different (e.g., 'filament.admin.auth.login')
            return redirect()->route('login');
        }

        // Check if the authenticated user has role_id of 2
        // Assuming 'role_id' is a column on your 'users' table
        if (Auth::user()->role_id !== 2) {
            // If role is not 2, redirect to dashboard or show an unauthorized message
            return redirect()->route('admin')->with('error', 'You do not have permission to access this content.');
            // Alternatively, you could abort with a 403 Forbidden error:
            // abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
