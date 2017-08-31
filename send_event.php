<?php

include "vendor/autoload.php";
use DomainEvent\ResourceCreatedEvent;

// 配置高顿的基础设施
$_SERVER['HTTP_HOST'] = 'domain-event';
\Gaodun\EnvDetect\Env::setEnv(\Gaodun\EnvDetect\Env::DEV);
$logger = \Logging\LoggingFactory::shared()->getLogger(__CLASS__);
$conf = \Conf\Conf::instance();


// 配置MQK的基本信息
// Redis默认使用127.0.0.1 6379端口 空密码 并且运行在静默模式下
// 修改Redis配置和关闭静默模式
\MQK\Config::defaultConfig()->setHost($conf->get("ep.redis.host"));
\MQK\Config::defaultConfig()->setPassword("gaodun.com");
\MQK\Config::defaultConfig()->setQuite(false);

// 使用高顿的graylog 的日志处理器
$handler = $logger->getHandlers()[0];
\MQK\LoggerFactory::shared()->pushHandler($handler);

// 使用高顿的graylog 的日志处理器 END

// 派发事件
K::dispatch(new ResourceCreatedEvent(1));