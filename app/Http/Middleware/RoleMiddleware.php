<?php

namespace App\Http\Middleware

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
   public function handle($request, Closure $next, $role)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }

        if (session('perfil_usuario') != $role) {
            return redirect('/');
        }

        return $next($request);
    }
}