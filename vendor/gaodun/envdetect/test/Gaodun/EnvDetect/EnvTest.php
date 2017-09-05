<?php
namespace Gaodun\EnvDetect;

use PHPUnit\Framework\TestCase;

class EnvTest extends TestCase
{
    public function testEquals()
    {
        Env::setEnv(Env::DEV);
        $this->assertTrue(Env::equal(Env::DEV));

        Env::setEnv(Env::TEST);
        $this->assertTrue(Env::equal(Env::TEST));

        Env::setEnv(Env::PRE);
        $this->assertTrue(Env::equal(Env::PRE));

        Env::setEnv(Env::PRODUCTION);
        $this->assertTrue(Env::equal(Env::PRODUCTION));
    }
}