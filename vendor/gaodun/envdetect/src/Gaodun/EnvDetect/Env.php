<?php
namespace Gaodun\EnvDetect;

class Env
{
    const DEV = 0;
    const TEST = 1;
    const PRE = 2;
    const PRODUCTION = 3;

    private static $env = -1;

    public static function env()
    {
        if (-1 == self::$env)
            self::$env = self::nginxEnviroment(getenv("DEPLOY_DOMAIN_PREFIX"));
        return self::$env;
    }

    public static function setEnv($env)
    {
        self::$env = $env;
    }

    public static function nginxEnviroment($nginxVariable)
    {
        $env = -1;
        switch ($nginxVariable) {
            case "dev-":
                $env = self::DEV;
                break;
            case "t-":
                $env = self::TEST;
                break;
            case "pre-":
                $env = self::PRE;
                break;
            case "":
                $env = self::PRODUCTION;
                break;
        }

        return $env;
    }

    public static function detect()
    {
        return self::env();
    }

    public static function equal($env)
    {
        return $env == self::detect();
    }
}