<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $site = app("site");
        app()->setLocale($site->language->code);
        $currentUrl = request()->getSchemeAndHttpHost();
        config(['app.url' => $currentUrl]);

        View::share('site', $site);
        return $next($request);
    }
}
