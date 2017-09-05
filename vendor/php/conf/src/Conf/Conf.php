<?php
namespace Conf;

use Illuminate\Config\Repository;

class Conf extends Repository
{
    /**
     * @var Conf
     */
    private static $_instance;

    public static function instance()
    {
        if (null == self::$_instance)
            self::$_instance == new Conf();

        return self::$_instance;
    }

    public static function setInstance($instance)
    {
        self::$_instance = $instance;
    }

}