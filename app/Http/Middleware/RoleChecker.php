<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/RoleCheck.php
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;

            if ($userRole == 'admin') {
                return $next($request);
            } else {
                return abort(403, 'Unauthorized');
            }
        }
    }
}