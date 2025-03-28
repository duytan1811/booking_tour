<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareDataToViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        View::share('current_user', Auth::user());
        $app_setting_data = Setting::query()->select('key', 'value')->get()->toArray();
        $app_settings = array_column($app_setting_data, 'value', 'key');
        if ($app_settings) {
            View::share('app_settings', $app_settings);
        }
        return $next($request);
    }
}
