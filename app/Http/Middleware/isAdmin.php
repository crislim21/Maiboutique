<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!auth()->check() || auth()->user()->role !== 'Admin') {
        //     abort(403);
        // }
        // elseif(!auth()->check() || auth()->user()->role !== 'Member'){
        //     abort(403);
        // }
        // return $next($request);
        if(auth()->check() || auth()->user()->role =='Admin') {
            return $next($request);
        }
        elseif(auth()->check() || auth()->user()->role =='Member') {
            return $next($request);
        }
        abort(403);
    }
}
