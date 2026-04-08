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
        // Esta línea es la que controla a dónde van los usuarios autenticados
        // cuando intentan entrar a rutas de 'guest' (como /login)
        $middleware->redirectUsersTo(fn () => route('admin.products.index'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();