
# Usage

```php
use Conf\ConfFactory;

$confFactory = new ConfFactory();
$conf = $confFactory->create();
assert("dev.mysql.gaodunwangxiao.com" == $conf->get('public.mysql.db.host'));

// Conf库会将 PUBLIC_MYSQL_DB_HOST 键替换成 public.mysql.db.host 
```

开发环境下增加如下配置：

```json
{
  "require": {
    "php/illuminate-support-php": "dev-master",
    "php/illuminate-config-php": "dev-master",
    "gaodun/consul-php-sdk": "1.0.10",
    "php/conf": "dev-master"
  },
  
  "repositories": [
    {
      "type": "git",
      "url": "ssh://git@gitlab.gaodun.com:22122/php/illuminate-support-php.git"
    },
    {
      "type": "git",
      "url": "ssh://git@gitlab.gaodun.com:22122/php/illuminate-config-php.git"
    },
    {
      "type": "git",
      "url": "ssh://git@gitlab.gaodun.com:22122/php/envdetect.git"
    },
    {
      "url": "ssh://git@gitlab.gaodun.com:22122/Behavior/consul.git",
      "type": "git"
    },
    {
      "type": "git",
      "url": "ssh://git@gitlab.gaodun.com:22122/php/conf.git"
    }
  ]
}

```