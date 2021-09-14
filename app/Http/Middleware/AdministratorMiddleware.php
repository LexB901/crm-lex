<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Response;

class AdministratorMiddleware
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
        $isadministrator = false;
        foreach (\Auth::user()->roles as $role) {
            if ($role->role == 'Administrator') {
                $isadministrator = true;
            }
        }

        if (!$isadministrator) {
            return response()->view('failed', ['role' => 'Administrator', '‘logged’' => $request->user()->role]);
        }

        return $next($request);
    }
}