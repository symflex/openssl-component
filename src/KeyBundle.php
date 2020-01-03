<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL;

/**
 * Interface KeyBundle
 * @package Symflex\Component\OpenSSL
 */
interface KeyBundle
{
    /**
     * @return PrivateKey
     */
    public function publicKey(): PublicKey;

    /**
     * @return PrivateKey
     */
    public function privateKey(): PrivateKey;
}
