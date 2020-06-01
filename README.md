# php-cs-fixer-config

My own custom [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer/) config

## Usage

Create a `.php_cs.dist` file with the following code:

```php
<?php

return My\PhpCsFixerConfig::create(
    __DIR__.'/src',
    __DIR__.'/tests',
    '!ignored',
);
```
