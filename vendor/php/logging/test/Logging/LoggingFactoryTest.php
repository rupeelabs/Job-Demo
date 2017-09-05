<?php

namespace Logging\Handler;

use Logging\LoggingFactory;
use PHPUnit\Framework\TestCase;
use Conf\ConfFactory;
use COnf\Conf;

class LoggingFactoryTest extends TestCase
{
    public function testGetLogger()
    {
        $factory = new LoggingFactory();
        $logger = $factory->getLogger(__CLASS__);
        $logger->debug("hello world");
    }
}