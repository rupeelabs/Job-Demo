<?php
namespace Conf;

use PHPUnit\Framework\TestCase;

class ConfFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new ConfFactory();
        $config = $factory->create();
    }
}