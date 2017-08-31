Domain event
=============

这个仓库是用来演示如何使用MQK进行监听领域事件。

## 安装

```
$ git clone http://gitlab.gaodun.com/weicongju/domain-event
$ cd domain-event
$ composer install -vvv
```

## 运行消费者

进入到domain-event的目录启动下面的命令，启动mqk开始处理。

```
$ docker run --rm -ti -v $(pwd):/de/ \
registry.cn-hangzhou.aliyuncs.com/gaodun-dev/php-dev:latest \
php /de/vendor/fatrellis/mqk/bin/mqk run --config /de/config.php -vvv
```

## 运行生产者

派发事件到消息总线。

```
$ php test_event.php
```
