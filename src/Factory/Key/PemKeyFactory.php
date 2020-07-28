<?php

namespace Symflex\Component\OpenSSL\Factory\Key;

use Symflex\Component\OpenSSL\Contracts\Key\BundleKey;
use Symflex\Component\OpenSSL\Contracts\Key\PrivateKey;
use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;
use Symflex\Component\OpenSSL\Contracts\KeyFactory;
use Symflex\Component\OpenSSL\Key\PemBundleKey;
use Symflex\Component\OpenSSL\Key\PemPublicKey;
use Symflex\Component\OpenSSL\Key\PemPrivateKey;
use SplFileObject;
use RuntimeException;
use Throwable;

/**
 * Class PemKeyFactory
 * @package Symflex\Component\OpenSSL\Factory\Key
 */
class PemKeyFactory implements KeyFactory
{
    /**
     * @param string $key
     * @return PublicKey
     */
    public function createPublicKey(string $key): PublicKey
    {
        if ($this->isPath($key)) {
            $key = $this->readFile($key);
        }

        return new PemPublicKey($key);
    }

    /**
     * @param string $key
     * @param string $passphrase
     * @return PrivateKey
     */
    public function createPrivateKey(string $key, string $passphrase = ''): PrivateKey
    {
        if ($this->isPath($key)) {
            $key = $this->readFile($key);
        }

        return new PemPrivateKey($key, $passphrase);
    }

    /**
     * @param string $publicKey
     * @param string $privateKey
     * @param string $passphrase
     * @return BundleKey
     */
    public function createBundleKey(string $publicKey, string $privateKey, string $passphrase): BundleKey
    {
        return new PemBundleKey($this->createPublicKey($publicKey), $this->createPrivateKey($privateKey, $passphrase));
    }

    /**
     * @param string $data
     * @return bool
     */
    protected function isPath(string $data): bool
    {
        return strpos($data, 'file://') === 0 ?? false;
    }

    /**
     * @param string $filePath
     * @return string
     * @throws RuntimeException
     */
    protected function readFile(string $filePath): string
    {
        try {
            $file = new SplFileObject($filePath);
            return $file->fread($file->getSize());
        } catch (Throwable $e) {
            throw new RuntimeException(sprintf('error read key file. %s', $e->getMessage()));
        }
    }
}
