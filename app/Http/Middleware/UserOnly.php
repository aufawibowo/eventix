<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserOnly
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
        if (Auth::user() && Auth::user()->role == 3) {
            return $next($request);
        }
        if (Auth::user() && Auth::user()->role == 2) {
            return redirect('/xxi');
        }
        if ($request->ajax()) {
          return response()->json(['message' => 'unauthorised'], 401);
        }
        return redirect('/login');
    }
}
