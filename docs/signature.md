## Sign data with a key

```php

use Symflex\Component\OpenSSL\Signature\Algorithm\Rsa\Sha256;
use Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory;

$keyFactory = new PemKeyFactory();
$publicKey  = $keyFactory->createPublicKey('file:///path_to_file');
$privateKey = $keyFactory->createPrivateKey('file:///path_to_file', 'passphrase');

$opensslSignature = new Sha256($publicKey, $privateKey);
$signature = $opensslSignature->sign('test data');

$isVerifed = $opensslSignature->verify('test data', $signature);

```
[I'm an inline-style link](https://www.google.com)