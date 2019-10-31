<?php

namespace App\Framework\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Contract\ConfigKey\PlatformInterface as PlatformConfigKeyInterface;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $mainRouteName = config(PlatformConfigKeyInterface::INDEX);

            return redirect()->route($mainRouteName);
        }

        return $next($request);
    }
}
