<?php
use DomainEvent\ResourceCreatedEvent;
use Logging\LoggingFactory;
use Gaodun\Event\ExamSyllabus\ExamSyllabusUpdateEvent;
use Gaodun\Event\ExamSyllabus\ExamSyllabusEventObject;
use Gaodun\Event\ExamSyllabus\CourseExamSyllabusChangeEvent;

$_SERVER['HTTP_HOST'] = 'domain-event';

\Gaodun\EnvDetect\Env::setEnv(\Gaodun\EnvDetect\Env::DEV);
$logger = \Logging\LoggingFactory::shared()->getLogger(__CLASS__);
$conf = \Conf\Conf::instance();
$handler = $logger->getHandlers()[0];
\MQK\LoggerFactory::shared()->pushHandler($handler);

$logger = LoggingFactory::shared()->getLogger("DomainEvent");


// 上面都是配置基本信息

// 关键是这里的时间监听

//K::addListener(ExamSyllabusUpdateEvent::NAME, function($event) use ($conf) {
//    var_dump($conf->get('public.mysql.db.host'));exit;
//});

K::addListener(
    ExamSyllabusUpdateEvent::NAME, [
        new \App\Listener\ExamSyllabusUpdateListener(),
        'handle'
    ]
);

K::addListener(
    CourseExamSyllabusChangeEvent::NAME, [
        new \App\Listener\CourseExamSyllabusChangeListener(),
        'handle'
    ]
);

//K::addListener(ResourceCreatedEvent::NAME, function($event) use ($logger) {
//    echo (new \HttpFoundation\RequestID())->id() . "\n";
//    $logger->debug("Resource did create {$event->id}");
//});