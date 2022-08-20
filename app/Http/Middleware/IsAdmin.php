<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            $user = Auth::user();
    
            if ($user->is_admin()) {
                if ($user->check_expired()) {
                    return $next($request);
                }
    
            }
    
            return redirect('/');
    
        }
    
        return redirect('/');
    }
}
