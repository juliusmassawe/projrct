<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string $id
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $id)
    {
        if (auth()->user()->role_id != $id){
            abort(403);
        }
        return $next($request);
    }
}
