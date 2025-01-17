<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        // بررسی وجود زبان در سشن و تنظیم زبان جاری
        if ($request->session()->has('locale')) {
            App::setLocale($request->session()->get('locale', 'en'));
        } else {
            // تنظیم زبان پیش‌فرض
            App::setLocale('en');
        }

        return $next($request);
    }
}

