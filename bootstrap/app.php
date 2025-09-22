<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Request as ProxyRequest; 
use App\Http\Controllers\Middleware\AdminOnly;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //


        $middleware->trustProxies(
            at: '*',
            headers: 
            ProxyRequest::HEADER_X_FORWARDED_FOR
            | ProxyRequest::HEADER_X_FORWARDED_HOST
            | ProxyRequest::HEADER_X_FORWARDED_PORT
            | ProxyRequest::HEADER_X_FORWARDED_PROTO
        );

        $middleware->alias([
            'admin' => AdminOnly::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

    
