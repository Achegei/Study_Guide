<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserTestAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is not authenticated, let the default authentication middleware handle it.
        // It will redirect to the login page if needed.
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();
        $userType = $user->user_type; // 'citizenship', 'driving', 'both'
        $routeName = $request->route()->getName(); // e.g., 'courses.index', 'driving.index'

        // Logic for citizenship test routes
        if (str_starts_with($routeName, 'courses.')) {
            // If user is 'driving' type and tries to access 'citizenship' courses
            if ($userType === 'driving') {
                return redirect()->route('driving.index')->with('error', 'You do not have access to Citizenship Test courses.');
            }
        }
        // Logic for driving test routes
        elseif (str_starts_with($routeName, 'driving.')) {
            // If user is 'citizenship' type and tries to access 'driving' courses
            if ($userType === 'citizenship') {
                return redirect()->route('courses.index')->with('error', 'You do not have access to Driving Test courses.');
            }
        }
        // If the userType is 'both' or the user has access to the requested route, proceed.
        // Or if the route is not a 'courses.' or 'driving.' route, allow access.

        return $next($request);
    }
}
