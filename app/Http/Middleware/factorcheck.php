<?php

namespace App\Http\Middleware;

use App\Model\Baskets;
use Closure;

class factorcheck
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

        $basket=Baskets::getcontent($request->user()->id);
        if(session('factor_id')!=null)
        {
            return $next($request);
        }
        elseif(session('factor_id')==null && count($basket)>0)
        {
            return redirect()->route('cart');
        }
        elseif(session('factor_id')==null && count($basket)==0)
        {
            return redirect()->route('');
        }
        abort(403);
    }
}
