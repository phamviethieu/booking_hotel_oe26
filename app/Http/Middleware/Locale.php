<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = Session::get('website_language', config('app.locale'));
        config(['app.locale' => $lang]);
        config(['app.fallback_locale' => $lang]);

        return $next($request);
    }
}
