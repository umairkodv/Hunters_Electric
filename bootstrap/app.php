<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // The framework's default Authenticate middleware redirects
        // unauthenticated visitors to a route literally named 'login'.
        // Admin-area requests go to the admin login screen (separate
        // guard); everything else (e.g. /account) goes to the customer
        // login screen, which now exists as a real named route.
        $middleware->redirectGuestsTo(function ($request) {
            return $request->is('admin*')
                ? route('admin.login')
                : route('login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
