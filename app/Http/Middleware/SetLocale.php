<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if 'lang' parameter in URL or use session or default
        $locale = $request->get('lang', Session::get('locale', config('app.locale')));

        // Set application locale
        App::setLocale($locale);

        // Store selected locale in session
        if ($request->has('lang')) {
            Session::put('locale', $locale);
        }

        return $next($request);
    }
}
