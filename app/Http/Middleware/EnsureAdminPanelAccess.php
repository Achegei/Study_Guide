<?php

namespace App\Http\Middleware; // This is the correct namespace with backslashes

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminPanelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and if they are an admin.
        // This middleware relies on your User model having an `isAdmin()` method.
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // If the user is not authenticated or not an admin,
            // prevent access by aborting with a 403 Forbidden status.
            // Alternatively, you could redirect them to a specific route,
            // e.g., `return redirect()->route('home')->with('error', 'Access denied.');`
            abort(403, 'Unauthorized access to the admin panel.');
        }

        return $next($request);
    }
}
