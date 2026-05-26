<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
{
    if (!auth()->check()) {
        return redirect('/'); // visitante
    }

    if (auth()->user()->role !== $role) {
        return redirect('/'); // o vista de error
    }

    return $next($request);
}
}
