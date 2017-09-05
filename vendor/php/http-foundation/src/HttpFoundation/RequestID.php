<?php
namespace HttpFoundation;

class RequestID
{
    /**
     * @var string
     */
    private static $id;

    public function id()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        if (self::$id == null) {
            self::$id = uniqid();
        }

        return self::$id;
    }
}