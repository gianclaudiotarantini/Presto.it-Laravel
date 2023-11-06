<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {    
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            // $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $locale = substr(session('locale', $request->getPreferredLanguage()),0,2);
            
            if ($locale != 'es' && $locale != 'en' && $locale != 'it') {
                $locale = 'en';
            }
        }
        
        App::setLocale($locale);
        return $next($request);
    }
}
