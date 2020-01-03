<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL\Key;

use Symflex\Component\OpenSSL\PrivateKey;
use Symflex\Component\OpenSSL\KeyBundle;
use Symflex\Component\OpenSSL\PublicKey;

/**
 * Class PemBundleKey
 * @package Symflex\Component\OpenSSL\Key
 */
class PemBundleKey implements KeyBundle
{
    /**
     * @var PrivateKey|PublicKey
     */
    protected PublicKey $public;

    /**
     * @var PrivateKey
     */
    protected PrivateKey $private;

    /**
     * PemBundleKey constructor.
     * @param PublicKey $public
     * @param PrivateKey $private
     */
    public function __construct(PublicKey $public, PrivateKey $private)
    {
        $this->public  = $public;
        $this->private = $private;
    }

    /**
     * @return PrivateKey
     */
    public function publicKey(): PublicKey
    {
        return $this->public;
    }

    /**
     * @return PrivateKey
     */
    public function privateKey(): PrivateKey
    {
        return  $this->private;
    }
}
