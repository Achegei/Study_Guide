<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Ensure Session facade is imported
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check for a locale in the URL path (if you plan to use /en/, /fr/ etc. routes)
        // This is less common with a dropdown switcher but good to have if your routes support it.
        // $locale = $request->segment(1); // e.g., for 'example.com/en/page'

        // 2. Prioritize locale from session
        $locale = Session::get('locale', config('app.locale')); // Get from session, default to app.locale

        // 3. Validate and set application locale
        // Ensure the locale is one of your supported ones (including the new zh and pa)
        $supportedLocales = ['en', 'fr', 'ar', 'so', 'es', 'zh', 'pa'];

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            // Re-save to session in case it was from config or a new request
            Session::put('locale', $locale);
        } else {
            // If the locale is invalid or not set, default to your app's fallback locale
            App::setLocale(config('app.fallback_locale', 'en'));
            Session::put('locale', config('app.fallback_locale', 'en'));
        }

        return $next($request);
    }
}
