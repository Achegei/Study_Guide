<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Session\Middleware\StartSession; // Import StartSession

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            StartSession::class, // Crucial for session to work correctly
            \App\Http\Middleware\SetLocale::class, // Ensure SetLocale runs within the web group, after StartSession
            \App\Http\Middleware\RedirectIfPasswordNotChanged::class,
        ]);

        // Remove this line, as it was appending SetLocale globally and might conflict
        // $middleware->append(\App\Http\Middleware\SetLocale::class);

        // Add your custom middleware aliases here
        $middleware->alias([
            'check.role' => \App\Http\Middleware\CheckUserRole::class,
            'password.change.required' => \App\Http\Middleware\RedirectIfPasswordNotChanged::class,
            'check.test.access' => \App\Http\Middleware\CheckUserTestAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    // NEW: Define command scheduling here for Laravel 11
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('users:delete-expired')->dailyAt('01:00'); // Runs daily at 1:00 AM
        // You can adjust the frequency as needed: ->hourly(), ->everyFiveMinutes(), etc.
    })
    ->withProviders([
        Laravel\Fortify\FortifyServiceProvider::class,
    ])
    ->create();
