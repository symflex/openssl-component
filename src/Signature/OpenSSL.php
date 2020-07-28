<?php

namespace Symflex\Component\OpenSSL\Signature;

use RuntimeException;
use Symflex\Component\OpenSSL\Contracts\Key\PrivateKey;
use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;
use function is_resource;
use function openssl_pkey_get_public;
use function openssl_pkey_get_private;
use function openssl_pkey_get_details;
use function openssl_error_string;
use function openssl_sign;
use function openssl_verify;
use function openssl_free_key;
use function openssl_pkey_free;

/**
 * Class OpenSSL
 * @package Symflex\Component\OpenSSL\Signature\Algorithm\Rsa
 */
abstract class OpenSSL
{
    public const VERIFY_SUCCESS = 1;

    /**
     * @var PublicKey
     */
    protected PublicKey $publicKey;

    /**
     * @var PrivateKey
     */
    protected PrivateKey $privateKey;

    /**
     * OpenSSL constructor.
     * @param PublicKey $publicKey
     * @param PrivateKey $privateKey
     */
    public function __construct(PublicKey $publicKey, PrivateKey $privateKey)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    protected function createSignature(string $data): string
    {
        $key = $this->getPrivateKey($this->privateKey);

        try {
            $signature = '';
            if (! openssl_sign($data, $signature, $key, $this->algorithm())) {
                throw new RuntimeException(
                    'There was an error while creating the signature: ' . openssl_error_string()
                );
            }

            return $signature;
        } finally {
            openssl_pkey_free($key);
        }
    }

    protected function verifySignature(string $data, string $signature): bool
    {
        $key = $this->getPublicKey($this->publicKey);
        $result = openssl_verify($data, $signature, $key, $this->algorithm());
        openssl_free_key($key);
        return $result === self::VERIFY_SUCCESS;

    }

    /**
     * @param PublicKey $publicKey
     * @return false|resource
     */
    public function getPublicKey(PublicKey $publicKey)
    {
        $keyResource = openssl_pkey_get_public($publicKey->content());
        $this->checkKey($keyResource);
        return $keyResource;
    }

    /**
     * @param PrivateKey $privateKey
     * @return false|resource
     */
    protected function getPrivateKey(PrivateKey $privateKey)
    {
        $keyResource = openssl_pkey_get_private($privateKey->content(), $privateKey->passphrase());
        $this->checkKey($keyResource);
        return $keyResource;
    }

    /**
     * @param $key
     * @throws RuntimeException
     */
    protected function checkKey($key)
    {
        if (!is_resource($key)) {
            throw new RuntimeException('key is not valid: ' . openssl_error_string());
        }

        $keyInfo = openssl_pkey_get_details($key);

        if ($keyInfo === false) {
            throw new RuntimeException('error key details: ' . openssl_error_string());
        }

        if ($keyInfo['type'] !== $this->type()) {
            throw new RuntimeException('This key is not compatible with this algorithm');
        }
    }

    /**
     * @return int
     */
    abstract protected function type(): int;

    /**
     * @return int
     */
    abstract protected function algorithm(): int;
}
