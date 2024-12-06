<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Convertir la lista de roles en un array
        
        
        // Verificar si el usuario no está autenticado o no tiene ninguno de los roles requeridos
        if (!$request->user() || !$request->user()->hasRole('superAdmin')) {
            return redirect('/');
        }

        return $next($request);
    }
}
