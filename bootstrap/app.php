<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustHosts(at: ['esimprod2.0.test']);
        $middleware->alias([
            'auth' => \App\Http\Middleware\IsLogin::class,
            'admin-or-superadmin' => \App\Http\Middleware\IsSuperadminOrAdmin::class,
            'user' => \App\Http\Middleware\IsUser::class,
            'superadmin' => \App\Http\Middleware\OnlySuperadmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
