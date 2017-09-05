<?php
\Gaodun\EnvDetect\Env::setEnv(\Gaodun\EnvDetect\Env::DEV);
$factory = new \Conf\ConfFactory();
$conf = $factory->create("domain-event");

$host = $conf->get('ep.redis.host');
$port = $conf->get('ep.redis.port');
$password = $conf->get('ep.redis.password');
$dsn = "redis://:{$password}@{$host}:{$port}";
return array(
    "init_script" => "./init.php",
    "workers" => 10,
    "dsn" => $dsn
);