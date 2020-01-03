<?php

namespace Symflex\Component\OpenSSL\Signature\Algorithm\Rsa;

use Symflex\Component\OpenSSL\Signature\Rsa;
use const OPENSSL_ALGO_SHA256;

/**
 * Class Sha256
 * @package Symflex\Component\OpenSSL\Signature\Algorithm\Rsa
 */
class Sha256 extends Rsa
{
    /**
     * @return int
     */
    protected function algorithm(): int
    {
        return OPENSSL_ALGO_SHA256;
    }
}
