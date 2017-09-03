<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 15:11
 */

namespace App\Util;

use Medoo\Medoo;

class DbFactory
{
    public static $instance;

    public $connection;

    private function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        //$conf = \Conf\Conf::instance();
        //echo $conf->get('public.mysql.db.host');exit;
//        echo $conf->get('public.mysql.db.type');
//        echo  $conf->get('ep.mysql.password');
//        echo $conf->get('public.mysql.db.port');
//        exit;
        try {
            $this->connection = new Medoo([
                'database_type' => 'mysql',
                'database_name' => 'gaodun',
                'server' => 'dev.mysql.gaodunwangxiao.com',
                'username' => 'gdtest',
                'password' => 'gdmysql_221',
                'charset' => 'utf-8',
                'port' => 3306,
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
            return;
        }
    }

    public function query($sql)
    {
         return $this->connection->query($sql)->fetchAll();
    }

    public static function shared()
    {
        if (null == self::$instance) {
            self::$instance = new DbFactory();
        }
        return self::$instance;
    }

}