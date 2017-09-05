<?php
namespace Conf;


use Throwable;

class CacheNameIsNull extends \Exception
{
    public function __construct(Throwable $previous = null)
    {
        $message = "Conf constructor parameter cacheName can not null";
        $code = 1;
        parent::__construct($message, $code, $previous);
    }
}