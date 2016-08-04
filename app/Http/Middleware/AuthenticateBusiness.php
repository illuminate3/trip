<?php

namespace App\Http\Middleware;
use Auth;
use Shinobi;
use Session;
use Closure;
use Illuminate\Http\RedirectResponse;


class AuthenticateBusiness 
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
        if ( Shinobi::is('business') ||  Shinobi::is('admin') ) {
            return $next($request);
        }
        session()->flash('errMsg','Freak me out');
        return redirect('/');
    }
}
