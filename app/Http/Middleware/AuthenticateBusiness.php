<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Routing\Middleware;

class AuthenticateBusiness implements Middleware
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
        if (! Auth::user()->can('access.admin')) {
            return back()->with(['auth.error'=>'You do not have access to this ']);
        }
        return $next($request);
    }
}
