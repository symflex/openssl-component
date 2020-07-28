<?php

namespace Symflex\Component\OpenSSL\Tests\Unit\Factory\Key;

use PHPUnit\Framework\TestCase;
use Symflex\Component\OpenSSL\Contracts\Key\PrivateKey;
use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;
use Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\Tests\Unit\KeySetUp;

/**
 * @coversDefaultClass \Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory
 */
class PemKeyFactoryTest extends TestCase
{
    use KeySetUp;

    /**
     * @test
     * @covers ::createPublicKey
     * @covers ::readFile
     * @covers ::isPath
     */
    public function createPublicKeyTest()
    {
        $keyFactory = new PemKeyFactory();

        $keyFromString = $keyFactory->createPublicKey($this->publicKeyString);
        $keyFromPath = $keyFactory->createPublicKey($this->publicKeyPath);

        $this->assertInstanceOf(PublicKey::class, $keyFromString);
        $this->assertInstanceOf(PemPublicKey::class, $keyFromString);
        $this->assertEquals($this->publicKeyString, $keyFromString->content());

        $this->assertInstanceOf(PublicKey::class, $keyFromPath);
        $this->assertInstanceOf(PemPublicKey::class, $keyFromPath);
        $this->assertEquals($this->publicKeyString, $keyFromPath->content());
    }

    /**
     * @test
     * @covers ::createPrivateKey
     * @covers ::readFile
     * @covers ::isPath
     */
    public function createPrivateKeyTest()
    {
        $keyFactory = new PemKeyFactory();

        $keyFromString = $keyFactory->createPrivateKey($this->privateKeyString, $this->keyPassphrase);
        $keyFromPath = $keyFactory->createPrivateKey($this->privateKeyPath, $this->keyPassphrase);

        $this->assertInstanceOf(PrivateKey::class, $keyFromString);
        $this->assertInstanceOf(PemPrivateKey::class, $keyFromString);
        $this->assertEquals($this->privateKeyString, $keyFromString->content());
        $this->assertEquals($this->keyPassphrase, $keyFromString->passphrase());

        $this->assertInstanceOf(PublicKey::class, $keyFromPath);
        $this->assertInstanceOf(PemPublicKey::class, $keyFromPath);
        $this->assertEquals($this->privateKeyString, $keyFromPath->content());
        $this->assertEquals($this->keyPassphrase, $keyFromPath->passphrase());
    }

    /**
     * @test
     * @covers ::createBundleKey
     * @covers ::readFile
     * @covers ::isPath
     */
    public function createBundleKeyTest()
    {
        $keyFactory = new PemKeyFactory();

        $keyBundleFromPath = $keyFactory->createBundleKey($this->publicKeyPath, $this->privateKeyPath, $this->keyPassphrase);
        $keyBundleFromString = $keyFactory->createBundleKey($this->publicKeyString, $this->privateKeyString, $this->keyPassphrase);

        /**
         * Assert public key
         */
        $this->assertInstanceOf(PublicKey::class, $keyBundleFromPath->publicKey());
        $this->assertInstanceOf(PemPublicKey::class, $keyBundleFromPath->publicKey());
        $this->assertInstanceOf(PublicKey::class, $keyBundleFromString->publicKey());
        $this->assertInstanceOf(PemPublicKey::class, $keyBundleFromString->publicKey());
        $this->assertEquals($this->publicKeyString, $keyBundleFromPath->publicKey()->content());

        /**
         * Assert privateKey
         */
        $this->assertInstanceOf(PrivateKey::class, $keyBundleFromPath->privateKey());
        $this->assertInstanceOf(PemPrivateKey::class, $keyBundleFromPath->privateKey());
        $this->assertInstanceOf(PrivateKey::class, $keyBundleFromString->privateKey());
        $this->assertInstanceOf(PemPrivateKey::class, $keyBundleFromString->privateKey());
        $this->assertEquals($this->privateKeyString, $keyBundleFromPath->privateKey()->content());
        $this->assertEquals($this->keyPassphrase, $keyBundleFromPath->privateKey()->passphrase());
    }

    /**
     * @test
     */
    public function badKeyPathTest()
    {
        $keyFactory = new PemKeyFactory();
        $this->expectException(\RuntimeException::class);
        $keyFactory->createPublicKey($this->publicKeyPath . 'bad');
    }
}
