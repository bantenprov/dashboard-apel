<?php namespace Bantenprov\DashboardApel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The DashboardApel facade.
 *
 * @package Bantenprov\DashboardApel
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DashboardApel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dashboard-apel';
    }
}
