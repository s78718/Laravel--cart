<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //session()取值,沒有代表未登入
        if(!session()->has('name')){
            return redirect('Login_Register');
        }

        return $next($request);
    }
}
