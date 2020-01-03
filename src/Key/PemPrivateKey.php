<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL\Key;

use Symflex\Component\OpenSSL\PrivateKey;

/**
 * Class PemKey
 * @package Symflex\Component\OpenSSL\Key
 */
class PemPrivateKey extends PemPublicKey implements PrivateKey
{
    /**
     * @var string
     */
    protected string $passphrase;

    /**
     * Pem constructor.
     * @param string $source
     * @param string $passphrase
     */
    public function __construct(string $source, string $passphrase)
    {
        parent::__construct($source);
        $this->passphrase = $passphrase;
    }

    public function passphrase(): string
    {
        return $this->passphrase;
    }
}
