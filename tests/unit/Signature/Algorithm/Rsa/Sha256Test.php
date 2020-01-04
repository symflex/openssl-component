<?php

namespace Symflex\Component\OpenSSL\Tests\Unit\Signature\Algorithm\Rsa;

use PHPUnit\Framework\TestCase;
use Symflex\Component\OpenSSL\Factory\Key\PemKeyFactory;
use Symflex\Component\OpenSSL\Signature\Algorithm\Rsa\Sha256;
use Symflex\Component\OpenSSL\Tests\Unit\KeySetUp;

/**
 * @coversDefaultClass \Symflex\Component\OpenSSL\Signature\Algorithm\Rsa\Sha256
 */
class Sha256Test extends TestCase
{
    use KeySetUp;
    /**
     * @test
     * @covers ::__construct
     * @covers ::createSignature
     * @covers ::getPrivateKey
     * @covers ::checkKey
     * @covers ::sign
     * @covers ::type
     * @covers ::algorithm
     * @covers ::verify
     * @covers ::verifySignature
     * @covers ::getPublicKey
     */
    public function signTest()
    {
        $keyFactory = new PemKeyFactory();
        $publicKey = $keyFactory->createPublicKey($this->publicKeyPath);
        $privateKey = $keyFactory->createPrivateKey($this->privateKeyPath, $this->keyPassphrase);

        $signer = new Sha256($publicKey, $privateKey);
        $signature = $signer->sign('test data');

        $this->assertIsString($signature);

        $isVerifed = $signer->verify('test data', $signature);

        $this->assertIsBool($isVerifed);
    }
}