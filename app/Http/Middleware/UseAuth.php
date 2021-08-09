<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UseAuth extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!session()->isStarted()) session()->start();
        if (user() == null) return redirect()->route("login");
        return $next($request);
    }
}
