<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginCheckPhpResponse
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
        if($request->user())
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login');
        }
        abort(403);
    }
}
