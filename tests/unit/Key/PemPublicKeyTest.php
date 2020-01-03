<?php

namespace Symflex\Component\OpenSSL\Tests\Unit\Key;

use PHPUnit\Framework\TestCase;
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\Tests\Unit\KeySetUp;

/**
 * Class PemPublicKeyTest
 * @package Symflex\Component\OpenSSL\Tests
 */
class PemPublicKeyTest extends TestCase
{
    use KeySetUp;

    /**
     * @test
     * @covers
     */
    public function keyFromStringTest()
    {
        $keyFromPath = new PemPublicKey($this->publicKeyPath);
        $keyFromString = new PemPublicKey($this->publicKeyString);
        $this->assertEquals($this->publicKeyString, $keyFromPath->content());
        $this->assertEquals($this->publicKeyString, $keyFromString->content());
    }
}
