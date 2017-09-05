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
        \Gaodun\EnvDetect\Env::setEnv(\Gaodun\EnvDetect\Env::DEV);
        $factory = new \Conf\ConfFactory();
        $conf = $factory->create("domain-event");
        $this->connection = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'gaodun',
            'server' => $conf->get('public.mysql.db.host'),
            'username' => $conf->get('ep.mysql.user'),
            'password' => $conf->get('ep.mysql.password'),
            'charset' => 'utf-8',
            'port' => $conf->get('public.mysql.db.port'),
        ]);
        if (is_null($this->connection)) {
            throw new \Exception('Can not connect to Mysql');
        }
    }

    public function query($sql)
    {
         return $this->connection->query($sql)->fetchAll();
    }

    public function insert($table, $data)
    {
        return $this->connection->insert($table, $data);
    }

    public static function shared()
    {
        if (null == self::$instance) {
            self::$instance = new DbFactory();
        }
        return self::$instance;
    }

}