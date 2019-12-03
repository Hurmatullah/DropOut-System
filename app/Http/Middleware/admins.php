<?php

namespace App\Http\Middleware;

use Closure;

class admins
{
    /**
     * Handle an incoming request.s
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status == 1) {
           
            return $next($request); 
        }
    }
}
