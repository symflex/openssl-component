<?php

namespace Symflex\Component\OpenSSL\Tests\Unit\Key;

use PHPUnit\Framework\TestCase;
use Symflex\Component\OpenSSL\Key\PemBundleKey;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\PrivateKey;
use Symflex\Component\OpenSSL\PublicKey;
use Symflex\Component\OpenSSL\Tests\Unit\KeySetUp;

class PemBundleTest extends TestCase
{
    use KeySetUp;

    /**
     * @test
     * @covers \Symflex\Component\OpenSSL\Key\PemBundleKey
     */
    public function bundleKeyTest()
    {
        $publicKeyFromPath  = new PemPublicKey($this->publicKeyPath);
        $privateKeyFromPath = new PemPrivateKey($this->privateKeyPath, $this->keyPassphrase);
        $keyBundlePath  = new PemBundleKey($publicKeyFromPath, $privateKeyFromPath);


        $this->assertInstanceOf(PublicKey::class, $keyBundlePath->publicKey());
        $this->assertInstanceOf(PrivateKey::class, $keyBundlePath->privateKey());

        $publicKeyFromString  = new PemPublicKey($this->publicKeyString);
        $privateKeyFromString = new PemPrivateKey($this->privateKeyString, $this->keyPassphrase);
        $keyBundleString  = new PemBundleKey($publicKeyFromString, $privateKeyFromString);


        $this->assertInstanceOf(PublicKey::class, $keyBundleString->publicKey());
        $this->assertInstanceOf(PrivateKey::class, $keyBundleString->privateKey());
    }
}
