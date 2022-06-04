<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UserAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('home');
        }
    }

    protected function authenticate($request, array $guards)
    {
        
        if ($this->auth->guard('servicepro')->check()) {
            return $this->auth->shouldUse('servicepro');
        }
        

        $this->unauthenticated($request, ['servicepro']);
    }
}
