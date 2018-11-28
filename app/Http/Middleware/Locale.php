<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*$raw_locale = $request->cookie('locale');
        if(!$raw_locale) {
            $raw_locale = session('locale');
        }
        if(!$raw_locale) {
            $raw_locale = $request->locale;
        }        
        if (in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        }
        else { $locale = app()->getLocale(); }
        app()->setLocale($locale);*/
        return $next($request);
    }
}
