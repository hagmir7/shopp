<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    public function handle(Request $request, Closure $next): Response
    {
        VisitorLog::firstOrCreate(
            ['ip_address' => $request->ip()], // Search attributes
            [
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
                'referrer' => $request->header('referer'),
                'visited_at' => now()
            ]
        );

        return $next($request);
    }
}
