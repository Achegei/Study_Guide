<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('--- SetLocale Middleware Start ---');
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('Current App Locale (before check): ' . App::getLocale());
        Log::info('Session has locale key: ' . (Session::has('locale') ? 'Yes' : 'No'));
        Log::info('Session contents: ' . json_encode(Session::all())); // This will be crucial

        if (Session::has('locale')) {
            $locale = Session::get('locale');
            App::setLocale($locale);
            Log::info('Locale set from session: ' . $locale);
        } else {
            // If no locale found, force setting a test key and try to save the session
            // This helps confirm if session writing is working at all.
            $testValue = 'test_value_' . time();
            Session::put('test_session_key', $testValue);
            Log::info('No locale in session. Set "test_session_key" to: ' . $testValue);

            // Re-dump session immediately after putting to see if it's visible within the same request
            Log::info('Session contents after putting test key: ' . json_encode(Session::all()));
        }

        $response = $next($request);

        Log::info('--- SetLocale Middleware End ---');
        return $response;
    }
}
