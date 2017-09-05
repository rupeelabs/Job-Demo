<?php
namespace Conf;

use SensioLabs\Consul\GDConsul;


class ConfFactory
{
    public function create($cacheName = null)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $cacheName = $_SERVER['HTTP_HOST'];
        } else {
            if ($cacheName == null) {
                throw new CacheNameIsNull();
            }
        }
        $consulURL = getenv('CONSUL_URL') ?: "test.consul.gaodunwangxiao.com/";
        $consulToken = getenv('CONSUL_TOKEN') ?: "";
        $consulData = \SensioLabs\Consul\GDConsul::get(
            $consulURL,
            $consulToken,
            $cacheName
        );

        $config = array();
        foreach ($consulData as $key => $value) {
            $keyPath = str_replace("_", ".", strtolower($key));

            $config[$keyPath] = $value;
        }

        if (null == Conf::instance())
            Conf::setInstance(new Conf($config));
        return Conf::instance();
    }
}