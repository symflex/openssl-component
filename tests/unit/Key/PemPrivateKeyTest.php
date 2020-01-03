<?php

namespace Symflex\Component\OpenSSL\Tests\Unit\Key;

use PHPUnit\Framework\TestCase;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;
use Symflex\Component\OpenSSL\Tests\Unit\KeySetUp;


/**
 * Class PemPrivateKeyTest
 * @package Symflex\Component\OpenSSL\Tests
 */
class PemPrivateKeyTest extends TestCase
{
    use KeySetUp;

    /**
     * @test
     * @covers
     */
    public function keyFromStringTest()
    {
        $keyFromPath = new PemPrivateKey($this->privateKeyPath, $this->keyPassphrase);
        $keyFromString = new PemPrivateKey($this->privateKeyString, $this->keyPassphrase);

        $this->assertEquals($this->privateKeyString, $keyFromPath->content());
        $this->assertEquals($this->keyPassphrase, $keyFromPath->passphrase());

        $this->assertEquals($this->privateKeyString, $keyFromString->content());
        $this->assertEquals($this->keyPassphrase, $keyFromString->passphrase());
    }
}
