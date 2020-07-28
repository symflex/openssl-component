<?php

namespace Symflex\Component\OpenSSL\Contracts;

use Symflex\Component\OpenSSL\Contracts\Key\BundleKey;
use Symflex\Component\OpenSSL\Contracts\Key\PrivateKey;
use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;

/**
 * Interface KeyFactory
 * @package Symflex\Component\OpenSSL
 */
interface KeyFactory
{
    /**
     * @param string $key
     * @param string $passphrase
     * @return PrivateKey
     */
    public function createPrivateKey(string $key, string $passphrase): PrivateKey;

    /**
     * @param string $key
     * @return PublicKey
     */
    public function createPublicKey(string $key): PublicKey;

    /**
     * @param string $publicKey
     * @param string $privateKey
     * @param string $passphrase
     * @return BundleKey
     */
    public function createBundleKey(string $publicKey, string $privateKey, string $passphrase): BundleKey;
}
