<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the logged-in user's role is in the allowed list
        if (!auth()->check() || !in_array(auth()->user()->role, $roles)) {
            return redirect('/dashboard')->with('error', 'Unauthorized access.');
        }
    
        return $next($request);
    }
}
