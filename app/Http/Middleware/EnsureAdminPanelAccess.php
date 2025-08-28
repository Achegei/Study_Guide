<?php

namespace App\Http\Middleware; // This is the correct namespace with backslashes

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        // Log the current user for debugging
        if (Auth::check()) {
            Log::info('User is authenticated', [
                'user_id' => Auth::id(),
                'user_email' => Auth::user()->email ?? null,
                'role_id' => Auth::user()->role_id ?? null,
            ]);
        } else {
            Log::warning('User is NOT authenticated', [
                'session_id' => $request->session()->getId(),
            ]);
        }

        // Check if the user is authenticated and an admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            Log::error('Unauthorized access attempt to admin panel', [
                'user' => Auth::user(),
                'url' => $request->fullUrl(),
            ]);
            abort(403, 'Unauthorized access to the admin panel.');
        }

        return $next($request);
    }
}
