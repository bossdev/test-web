<?php

namespace App\Http\Middleware;

use Closure;

class PushTestNumTwo
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
        if($request->input('num') != 2){
            return redirect('/user/session');
        }
        return $next($request);
    }
}
