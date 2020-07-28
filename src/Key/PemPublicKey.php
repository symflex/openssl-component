<?php

namespace Symflex\Component\OpenSSL\Key;

use Symflex\Component\OpenSSL\Contracts\Key\PublicKey;

/**
 * Class PemPrivateKey
 * @package Symflex\Component\OpenSSL\Key
 */
class PemPublicKey implements PublicKey
{
    /**
     * @var string
     */
    protected string $content;

    /**
     * PemPrivateKey constructor.
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->content = $source;
    }

    /**
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }
}
