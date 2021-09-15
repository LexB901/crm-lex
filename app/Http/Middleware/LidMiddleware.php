<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LidMiddleware
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
        $islid = false;
        foreach (\Auth::user()->roles as $role) {
            if ($role->role == 'Lid') {
                $islid = true;
            }
        }

        if (!$islid) {
            return response()->view('failed', ['role' => 'Lid', '‘logged’' => $request->user()->role]);
        }

        return $next($request);
    }
}
