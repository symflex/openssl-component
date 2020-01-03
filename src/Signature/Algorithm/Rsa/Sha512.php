<?php

namespace Symflex\Component\OpenSSL\Signature\Algorithm\Rsa;

use Symflex\Component\OpenSSL\Signature\Rsa;
use const OPENSSL_ALGO_SHA512;

/**
 * Class Sha512
 * @package Symflex\Component\OpenSSL\Signature\Algorithm\Rsa
 */
class Sha512 extends Rsa
{
    /**
     * @return int
     */
    protected function algorithm(): int
    {
        return OPENSSL_ALGO_SHA512;
    }
}
