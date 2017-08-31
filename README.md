Domain event
=============

这个仓库是用来演示如何使用MQK进行监听领域事件。

## 运行消费者

```
$ docker run --rm -ti -v $(pwd):/de/ \
registry.cn-hangzhou.aliyuncs.com/gaodun-dev/php-dev:latest \ 
php /de/vendor/fatrellis/mqk/bin/mqk run --config /de/config.php
```

## 运行生产者

$ php test_event.php

