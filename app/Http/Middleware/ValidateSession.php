<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ValidateSession
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
       if(!Session('email')){
            return redirect('login');
       }

       return $next($request);
    }
}
