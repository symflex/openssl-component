## Create keys

#### From simple
Create from key content as string
```php
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;

$publicKey  = new PemPublicKey('key content');
$privateKey = new PemPrivateKey('key content', 'passphrase');
```

#### From factory
Create from key content as string or path to file.
```php

use Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory;

$keyFactory = new PemKeyFactory();


$publicKey = $keyFactory->createPublicKey('file:///path_to_file');
$privateKey = $keyFactory->createPrivteKey('file:///path_to_file', 'passphrase');
```