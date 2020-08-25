<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7\Response;

/**
 * Check if loggen in user has access to mentor profile.
 */
class MentorProfileAccess
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
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        } else {
            return redirect('/home');
        }
    }
}
