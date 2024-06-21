<?php

use App\Models\Role;
use App\Models\User;
use App\Notifications\ExceptionNotification;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Notification;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectUsersTo('/');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (Throwable $exception) {
            Notification::send(
                User::whereRelation('role', 'name', Role::$ADMIN)->get(),
                new ExceptionNotification($exception)
            );
        });
    })->create();
