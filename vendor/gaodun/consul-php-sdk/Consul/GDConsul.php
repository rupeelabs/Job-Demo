<?php

namespace SensioLabs\Consul;
use Gaodun\EnvDetect\Env;

/**
 * 针对高顿调用
 * Class GD
 * @package SensioLabs\Consul
 */
class GDConsul {

    static public function get($baseUri = '', $token='', $hostName='')
    {
        try {
            return self::cache($hostName, function() use ($baseUri, $token) {
                if (empty($baseUri)) {
                    $baseUri = getenv('CONSUL_URL');
                }
                if (empty($token)) {
                    $token = getenv('CONSUL_TOKEN');
                }
                $sf = new ServiceFactory(['base_uri' => $baseUri, 'headers'=>['X-Consul-Token'=>$token]]);
                $kv = $sf->get('kv');
                $val = $kv->get('gaodun/config_center', ['keys' => true]);
                $data = $val->json();
                $dataList = [];
                foreach ($data as $value) {
                    if (substr($value,-1) != '/') {
                        $tmp = explode('/', $value);
                        $result = $kv->get($value, ['raw'=>true])->getBody();
                        $tmpStr = $tmp[count($tmp)-1];
                        $dataList[$tmpStr] = $result;
                    }
                }
                return $dataList;
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    static function cache($hostName, $callback)
    {
        $env = Env::detect();
        $cacheable = !in_array(
            $env,
            array(Env::DEV, Env::TEST)
        );

        if (empty($hostName))  {
            $hostName = $_SERVER['HTTP_HOST'];
        }

        $cacheDir = "/gaodun/cache/" . $hostName;
        $cachePath = $cacheDir . "/consul.php";
        if ($cacheable) {
            $dataList = '';
            if (is_file($cachePath)) {
                $dataList = unserialize(@file_get_contents($cachePath));
            }

            if (!empty($dataList) && is_array($dataList)) {
                return $dataList;
            } else {
                $dataList = $callback();
            }
        } else {
            $dataList = $callback();
        }



        if ($cacheable) {
            @mkdir($cacheDir);
            file_put_contents($cachePath, serialize($dataList));
        }

        return $dataList;
    }
}
