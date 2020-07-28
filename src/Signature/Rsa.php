<?php

namespace Symflex\Component\OpenSSL\Signature;

use Symflex\Component\OpenSSL\Contracts\Signature;
use const OPENSSL_KEYTYPE_RSA;

/**
 * Class Rsa
 * @package Symflex\Component\OpenSSL\Signature
 */
abstract class Rsa extends OpenSSL implements Signature
{
    /**
     * @param string $data
     * @return string
     */
    public function sign(string $data): string
    {
        return $this->createSignature($data);
    }

    /**
     * @param string $data
     * @param string $signature
     * @return bool
     */
    public function verify(string $data, string $signature): bool
    {
        return $this->verifySignature($data, $signature);
    }

    /**
     * @return int
     */
    protected function type(): int
    {
        return OPENSSL_KEYTYPE_RSA;
    }
}
