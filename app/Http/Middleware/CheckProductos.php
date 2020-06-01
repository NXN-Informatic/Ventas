<?php

namespace App\Http\Middleware;

use Closure;

class CheckProductos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->id == 'doctor') return $next($request);
        
        return redirect('/home');
    }
}
