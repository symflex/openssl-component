<?php

namespace Symflex\Component\OpenSSL\Key;

use Symflex\Component\OpenSSL\Contracts\Key\BundleKey;
use Symflex\Component\OpenSSL\Contracts\Key\PrivateKey;
use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;

/**
 * Class PemBundleKey
 * @package Symflex\Component\OpenSSL\Key
 */
class PemBundleKey implements BundleKey
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
