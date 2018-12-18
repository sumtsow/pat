<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Routing\Route;

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
        $crypted = $request->cookie('locale');
        $locale = app()->getLocale();
        if(isset($crypted)) {
            $locale = \Crypt::decryptString($crypted);
        }
        if (in_array($locale, Config::get('app.locales'))) {
            app()->setLocale($locale);
        }
        /*$path = $request->path();
        $input = explode('/', strstr($path, 'setlocale'));
        $lang = array_pop($input);
        if(in_array($lang, Config::get('app.locales'))) {
            $locale = $lang;
            $url = str_replace('/setlocale/'.$locale, '', $path);
            app()->setLocale($locale);
            $request->replace(['path' => $url]);
            //return redirect($url)->cookie('locale', $locale, 120);
        }*/
        return $next($request);
    }
}
