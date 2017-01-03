<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.8
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Exzcute\SentinelRoleManagement\Facades;

use Exzcute\SentinelRoleManagement\RoleManagement as RM;

class RoleManagement
{
    
    protected $sentinel;

    
    protected static $instance;

  
    public function __construct($bootstrapper = null)
    {
        if ($bootstrapper === null) {
            $bootstrapper = new RM;
        }

        $this->sentinel = $bootstrapper;
    }
    
    public function getSentinel()
    {
        return $this->sentinel;
    }

    public static function instance(SentinelBootstrapper $bootstrapper = null)
    {
        if (static::$instance === null) {
            static::$instance = new static($bootstrapper);
        }

        return static::$instance;
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::instance()->getSentinel();

        switch (count($args)) {
            case 0:
                return $instance->{$method}();

            case 1:
                return $instance->{$method}($args[0]);

            case 2:
                return $instance->{$method}($args[0], $args[1]);

            case 3:
                return $instance->{$method}($args[0], $args[1], $args[2]);

            case 4:
                return $instance->{$method}($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }
}
