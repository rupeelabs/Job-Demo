<?php
namespace Logging\Handler;

use Gelf\Message;
use HttpFoundation\RequestID;
use Monolog\Logger;

class GelfHandler extends \Monolog\Handler\GelfHandler
{
    /**
     * @var array
     */
    private $extra;

    public function extra()
    {
        return $this->extra;
    }

    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    public function write(array $record)
    {
        $message = $record['formatted'];

        if (isset($_SERVER['HTTP_HOST'])) {
            $httpHost = $_SERVER['HTTP_HOST'];
            $message->setAdditional('server_host', $httpHost);
        }
        $message->setAdditional('request_id', (string)(new RequestID()));
        if (null != $this->extra && is_array($this->extra)) {
            foreach ($this->extra as $key => $value) {
                $additionKey = self::fromCamelCase($key);
                $message->setAdditional($additionKey, $value);
            }
        }

        parent::write($record);
    }

    /**
     * TODO: 从gdframework拷贝，不想再次引入一个composer库增加复杂度
     * 使用private repository解决composer库递归依赖的问题
     * 
     * From camel case to snake case
     *
     * copy from https://stackoverflow.com/questions/1993721/how-to-convert-camelcase-to-camel-case
     *
     * @param $input
     * @return string
     */
    public static function fromCamelCase($input) {
        preg_match_all(
            '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!',
            $input,
            $matches
        );
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ?
                strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}