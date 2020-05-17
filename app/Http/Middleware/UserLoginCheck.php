<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginCheck
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
        // dd($request->user());die;
        if($request->user())
        {
            return $next($request);
        }
        else
        {
            return response()->json(array('url'=>url('/login')));
        }
        abort(403);
    }
}
