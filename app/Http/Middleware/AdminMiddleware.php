<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if (Auth::check()) {
            if (Auth::user()->user_type_id == 3) {
                return $next($request);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
