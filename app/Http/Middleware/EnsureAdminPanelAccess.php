<?php

namespace App\Http\Middleware; // This is the correct namespace with backslashes

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminPanelAccess
{
    public function handle(Request $request, Closure $next): Response
{
    $user = Auth::user();

    // Log the current user info
    Log::info('EnsureAdminPanelAccess check', [
        'authenticated' => Auth::check(),
        'user' => $user ? $user->toArray() : null,
    ]);

    if (!Auth::check() || !$user->isAdmin()) {
        Log::warning('Unauthorized access attempt', [
            'user' => $user ? $user->toArray() : null,
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
        ]);

        abort(403, 'Unauthorized access to the admin panel.');
    }

    return $next($request);
}
}
