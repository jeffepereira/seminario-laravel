<?php

namespace App\Http\Middleware;

use Closure;

class RedirectWithIdPost
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
        if (auth()->user()->type !== "admin") {
            return redirect(route('post.index'));
        }

        return $next($request);
    }
}
