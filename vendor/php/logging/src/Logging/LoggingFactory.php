<?php
namespace Logging;

//use Monolog\Handler\GelfHandler;
use Logging\Handler\GelfHandler;
use Monolog\Logger;
use Conf\ConfFactory;
use COnf\Conf;
use Gelf\Transport\UdpTransport;
use Gelf\Publisher;
use Gelf\Message;
use Psr\Log\LogLevel;

class LoggingFactory
{
    /**
     * @var LoggingFactory
     */
    public static $loggingFactory;

    private $logger;
    /**
     * @var Conf
     */
    private $conf;

    private $extra;

    public function __construct()
    {
        $confFactory = new ConfFactory();
        $this->conf = $confFactory->create();
    }

    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    public function getLogger($name)
    {
        if (isset($this->logger[$name])) {
            return $this->logger[$name];
        }

        $logger = new Logger($name);

        $graylogConf = $this->conf->get("public.log.gray.path");
        if ($graylogConf)
            list($host, $port) = explode(":", $graylogConf);
        else {
            throw new \Exception("Conf public.log.gray.path is null.");
        }
        $transport = new UdpTransport(
            $host,
            $port,
            UdpTransport::CHUNK_SIZE_LAN
        );
        $publisher = new Publisher();
        $publisher->addTransport($transport);

        $handler = new GelfHandler($publisher);
        $logger->pushHandler($handler);

        return $logger;
    }

    public static function shared()
    {
        if (null == self::$loggingFactory)
            self::$loggingFactory = new LoggingFactory();

        return self::$loggingFactory;
    }
}