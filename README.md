# Phproxy

![StyleCI](https://github.styleci.io/repos/301836154/shield?branch=master) [![Build Status](https://travis-ci.org/Borkness/phproxy.svg?branch=master)](https://travis-ci.org/Borkness/phproxy)

Phproxy is a class that can be used to statically call the methods of an underlying class similar to Facades in Laravel.

## Usage

### Initial Setup

In order to use Phproxy you must implement a PSR-11 compatible container. Implementations you could use are:

- PHP-DI (Recommended)
- League Container
- Aura-DI

Once you have installed and created the container you need to call the `setInstanceResolver()` method passing in the container.

```php
\Borkness\Phproxy\Phproxy::setInstanceResolver($container);
```

### Creating a proxy class
To create a proxy class you will need to extend the Phproxy abstract class overriding the `getClassIdentifier()` method. You must add the string you used for the class when setting up the DI container.

##### Example:
```php
<?php

namespace App\Proxies;

use Borkness\Phproxy\Phproxy;

class Database extends Phproxy
{
    public static function getClassIdentifier()
    {
        return 'db';
    }
}
```
