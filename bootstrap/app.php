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
        // Ensure that StartSession is part of your web middleware group.
        // It's crucial for session functionality, including locale persistence.
        $middleware->web(append: [
            StartSession::class, // <-- Crucial for session to work correctly
        ]);

        $middleware->append(\App\Http\Middleware\SetLocale::class);

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
    ->withSchedule(function (Schedule $schedule) { // <-- Introduced: Scheduling configuration
        $schedule->command('users:delete-expired')->dailyAt('01:00'); // Runs daily at 1:00 AM
        // You can adjust the frequency as needed: ->hourly(), ->everyFiveMinutes(), etc.
    }) // <-- End of scheduling configuration
    ->withProviders([
        Laravel\Fortify\FortifyServiceProvider::class,
    ])
    ->create();

