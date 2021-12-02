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
        $userrole = \Auth::user()->roles;
        echo ($userrole);
        foreach ($userrole as $role) {
            if ($role->role == 'Admin') {
                $isadministrator = true;
            }
        }

        if (!$isadministrator) {
            return response()->view('failed', ['role' => 'Admin', '‘logged’' => $request->user()->role]);
        }

        return $next($request);
    }
}
