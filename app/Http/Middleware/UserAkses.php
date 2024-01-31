<?php

namespace App\Http\Middleware;

use Closure;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(in_array($request->user()->role, $roles)){
            return $next($request);
        }
        return response()->json(['Anda tidak memiliki akses untuk membuka halaman ini! ']);
    }
}
