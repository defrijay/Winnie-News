<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DebugSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Session ID: ' . session()->getId());

        return $next($request);
    }
}
