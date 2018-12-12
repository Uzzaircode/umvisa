<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    protected $redirectTo = '/applications';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect($this->redirectTo);
        // }
        switch ($guard) {
            case 'staff':
                if (Auth::guard($guard)->check()) {
                    return redirect($this->redirectTo);
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect($this->redirectTo);
                }
                break;
        }

        return $next($request);
    }
}
