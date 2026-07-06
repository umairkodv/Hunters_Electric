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
        // unauthenticated visitors to a route literally named 'login',
        // which doesn't exist in this app (only 'admin.login' does, since
        // there's no public customer login yet). This sends admin-area
        // requests to the admin login screen instead.
        $middleware->redirectGuestsTo(function ($request) {
            return $request->is('admin*')
                ? route('admin.login')
                : route('home');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
