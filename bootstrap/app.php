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
		$middleware->trustHosts(at: ['esimprod2.0.test', '127.0.0.1']);
		$middleware->alias([
			'auth' => \App\Http\Middleware\IsLogin::class,
			'role' => \App\Http\Middleware\CheckRole::class,
			'verified.password' => \App\Http\Middleware\VerifiedPassword::class,
		]);
	})
	->withExceptions(function (Exceptions $exceptions) {
		//
	})->create();
