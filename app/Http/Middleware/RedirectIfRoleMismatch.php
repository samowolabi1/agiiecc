<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfRoleMismatch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

         if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // Redirect the user to a different page, such as the home page or a 403 page
            return redirect()->route('dashboard');  // Redirect to home page or any other route
        }
        return $next($request);
    }
}
