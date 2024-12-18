<?php

use App\Http\Middleware\CheckRoleAdmin;
use App\Http\Middleware\CheckRoleProfe;
use App\Http\Middleware\CheckRoleSuperAdmin;
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
        $middleware->alias([
            'roleAdmin' => CheckRoleAdmin::class,
        ]);
        $middleware->alias([
            'roleSuperAdmin' => CheckRoleSuperAdmin::class,
        ]);
        $middleware->alias([
            'roleSuperAdmin' => CheckRoleProfe::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
