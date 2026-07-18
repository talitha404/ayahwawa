<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role The role required to access the route.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Pastikan user sudah login dan memiliki relasi role
        if (!Auth::check() || !Auth::user()->role) {
            return abort(403, 'UNAUTHORIZED ACTION.');
        }

        // Cek apakah nama role user sesuai dengan yang diizinkan di route
        // Contoh: middleware('role:admin') akan memeriksa apakah role user adalah 'admin'
        if (Auth::user()->role->name !== $role) {
            return abort(403, 'UNAUTHORIZED ACTION.');
        }

        return $next($request);
    }
}
