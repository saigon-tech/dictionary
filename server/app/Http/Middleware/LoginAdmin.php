<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {dd(Auth::check());
        if (Auth::check()) {
            return $next($request);
        }
        return redirect(route('get_login'));
    }
}
