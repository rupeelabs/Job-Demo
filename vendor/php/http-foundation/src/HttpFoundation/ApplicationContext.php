<?php
namespace HttpFoundation;


class ApplicationContext
{
    private static $instance;


    /**
     * @var RequestID;
     */
    private $requestID;

    private $startTime;

    private $endTime;

    private function __construct()
    {
        $this->requestID = new RequestID();
    }

    function microTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);;
    }

    public function flagStartTime()
    {
        $this->startTime = $this->microTime();
    }

    public function flagEndTime()
    {
        $this->endTime = $this->microTime();
    }

    public function durationTiem()
    {
        $duration = $this->endTime - $this->startTime;
        if ($duration < 0)
            $duration = 0;
        return $duration;
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new ApplicationContext();
        }

        return self::$instance;
    }

}