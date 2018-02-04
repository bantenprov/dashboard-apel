<?php namespace Bantenprov\DashboardApel\Http\Middleware;

use Closure;

/**
 * The DashboardApelMiddleware class.
 *
 * @package Bantenprov\DashboardApel
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DashboardApelMiddleware
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
        return $next($request);
    }
}
