<?php

namespace App\Http\Middleware; // This is the correct namespace with backslashes

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminPanelAccess
{
    public function handle(Request $request, Closure $next): Response
{
    \Log::info('EnsureAdminPanelAccess middleware hit', [
        'auth_check' => Auth::check(),
        'user' => Auth::user() ? Auth::user()->only(['id','name','email','role_id']) : null,
        'route' => $request->path(),
    ]);

    if (!Auth::check() || !Auth::user()->isAdmin()) {
        \Log::warning('Admin access denied', [
            'auth_check' => Auth::check(),
            'user' => Auth::user() ? Auth::user()->only(['id','name','email','role_id']) : null,
        ]);

        abort(403, 'Unauthorized access to the admin panel.');
    }

    return $next($request);
}

}
