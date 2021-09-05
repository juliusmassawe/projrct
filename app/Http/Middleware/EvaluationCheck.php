<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EvaluationCheck
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
        $roles = [4,5,6];
        if (!in_array(auth()->user()->role_id, $roles)){
            abort(403);
        }
        return $next($request);
    }
}
