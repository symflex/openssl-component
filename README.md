# OpenSSL 
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg?style=flat-square)](https://php.net/)

## Installation

Package is available on [Packagist](https://packagist.org/packages/symflex/openssl-component),
you can install it using [Composer](https://getcomposer.org).

```shell
composer require symflex/openssl-component
```

## Dependencies

- PHP 7.4
- OpenSSL Extension

## Usage

```php
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;
...

$publicKey  = new PemPublicKey('file:///path_to_file');
$privateKey = new PemPrivateKey('file:///path_to_file', 'passphrase');
```

OR

```php
use Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory;
...

$keyFactory = new \Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory();
$publicKey  = $keyFactory->createPublicKey('file:///path_to_file');
$privateKey = $keyFactory->createPrivateKey('file:///path_to_file', 'passphrase');
```