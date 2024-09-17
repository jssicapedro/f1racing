<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!auth()->check() || in_array('guest', $roles)) {
            return $next($request);
        }else{
            if(!auth()->check()) {
                abort(403);
            }

            if(!in_array(auth()->user()->role->name, $roles)) {
                abort(403);
            }elseif(auth()->check() && !in_array('guest', $roles)) {
                return $next($request);
            }
        }

        return $next($request);
    }
}
