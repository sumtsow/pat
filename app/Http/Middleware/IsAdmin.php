<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $path = strstr($request->getPathInfo(), 'blog');
        if($path && Auth::user()) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('blogadmin');
            }
        }
        return $next($request);
    }
}
