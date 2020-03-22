<?php

namespace App\Http\Middleware;

use Closure;

class CheckPin
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
        if ($request->cookie('pin') === 'okay') {
            return $next($request);
        }

        return redirect(route('pin.create'));
    }
}
