<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL;

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
     * @return KeyBundle
     */
    public function createBundleKey(string $publicKey, string $privateKey, string $passphrase): KeyBundle;
}
