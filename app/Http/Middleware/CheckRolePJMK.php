<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRolePJMK
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Cek apakah pengguna memiliki peran yang diperlukan
        if (!in_array($request->user()->role_id, [1,2])) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
