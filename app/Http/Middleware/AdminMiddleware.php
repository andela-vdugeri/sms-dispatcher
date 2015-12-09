<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $user = Auth::user();
        $role = $user->roles()->orderBy('role_name')->first();
        
        if (!($role->role_name === 'admin')) {

            return redirect('/');
        }

        return $next($request);
    }
}
