Consul SDK
==========

Compatibility
-------------

This table shows this SDK compatibility regarding Guzzle version:

| SDK Version | Guzzle Version
| ----------- | --------------
| 1.x         | >=4, <6
| 2.x         | 6

Installation
------------

This library can be installed with composer:

```
    "require" : {
        gaodun/consul-php-sdk : 1.0.*
    },
    //
    "type":"git",
    "url":"http://gitlab.gaodun.com/Behavior/consul.git"
    //
    
```

Usage
-----

The simple way to use this SDK :

$result = SensioLabs\Consul\GDConsul::get(getenv('CONSUL_URL'), getenv('CONSUL_TOKEN'));
printf($result);

Some utilities
--------------

* Lock handler: Simple class that implement a distributed lock
