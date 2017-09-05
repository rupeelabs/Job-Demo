<?php
namespace SensioLabs\Consul;

use Gaodun\EnvDetect\Env;
use PHPUnit\Framework\TestCase;

class GDConsulTest extends TestCase
{
    public function testGetCached()
    {
        Env::setEnv(Env::DEV);
        putenv("CONSUL_URL=http://dev.consul.gaodunwangxiao.com/");
        $config = GDConsul::get("", "", "test");
        $this->assertGreaterThan(0, count($config));
    }
}