<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LogoutMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Auth::logout();
            Session::invalidate();
            Session::regenerateToken();
        }

        return $next($request);
    }
}
