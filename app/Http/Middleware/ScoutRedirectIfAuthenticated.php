<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoutRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        
        if (Auth::guard('scout')->check()) {
            return redirect()->route('scout.dashboard');
        }
        

        return $next($request);
    }


    // public function handle($request, Closure $next, $guard = 'admin')
	// {
	// 	if (!Auth::guard($guard)->check()) {
	// 		return redirect('/admin');
	// 	}
	
	// 	return $next($request);
	// }

}
