<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
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
      if(session('user') === null || session('user')->role_id === 1) {
        return redirect('/login');
      }else if(session('user')->role_id === 3 || session('user')->role_id === 2) {
        return $next($request);
      }
    }
}
