<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Illuminate\Http\Response;

class UserMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$this->auth->user()->user_status
        if ($this->auth->check()) {
            if($this->auth->user()->user_type == "normal_user"){
                return $next($request);
            }else{
                return redirect('/');
            }

        } else {

            return redirect('/');
        }

    }
}
