<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/5
 * Time: 18:49
 */

namespace App\Util;


class SentryNotify
{
    public static function notify($title, $message = [])
    {
        $ex = new \Exception($title);
        $sentryClient = new \Raven_Client("http://84942ae0b9d54d88b7b72f8e4df4a98d:74f0c425ac7949868bb2b36dcf2388cc@sentry.gaodunwangxiao.com/20");
        $sentryClient->captureException($ex, ['extra' => $message]);
    }
}