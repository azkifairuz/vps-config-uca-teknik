<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManifestJsonMiddleware
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
        $response = $next($request);

        if ($request->is('manifest.json')) {
            $response->header('Content-Type', 'application/json');
        }

        return $response;
    }
}
