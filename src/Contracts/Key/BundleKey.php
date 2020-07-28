<?php

namespace Symflex\Component\OpenSSL\Contracts\Key;

/**
 * Interface BundleKey
 * @package Symflex\Component\OpenSSL\Contracts\Key
 */
interface BundleKey
{
    /**
     * @return PublicKey
     */
    public function publicKey(): PublicKey;

    /**
     * @return PrivateKey
     */
    public function privateKey(): PrivateKey;
}
