<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        // return $next($request);
        $id= auth()->user()->id;
        $user= User::find($id);
        foreach ($user->roles as $role)
        // dd($user);
            if($role->name=='admin')
            {
                return $next($request);  

            }elseif ($role->name=='user')
            {
                return redirect('/');
            }
        abort(403);
    }
}
