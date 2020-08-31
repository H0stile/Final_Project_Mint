<?php

namespace App\Http\Middleware;

use Closure;

class MentorSearch
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
        $loggedInUser = $request->user();
        if ($loggedInUser->type === 'mentor') {
            return response()->view("unauthorized");
        }
        return $next($request);
    }
}
