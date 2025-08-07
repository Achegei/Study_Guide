<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(\App\Http\Middleware\SetLocale::class);

        // ✅ Add your custom middleware alias here (if you want to use it on specific routes)
        $middleware->alias([
            'check.role' => \App\Http\Middleware\CheckUserRole::class,
            'password.change.required' => \App\Http\Middleware\RedirectIfPasswordNotChanged::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    // ✅ ADD THIS BLOCK to register service providers
    ->withProviders([
        Laravel\Fortify\FortifyServiceProvider::class, // ✅ Add Fortify's service provider
    ])
    ->create();
