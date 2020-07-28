<?php

namespace Symflex\Component\OpenSSL\Contracts\Key;

use Symflex\Component\OpenSSL\Contracts\Key;

/**
 * Interface PrivateKey
 * @package Symflex\Component\OpenSSL\Contracts\Key
 */
interface PrivateKey extends Key
{
    /**
     * @return string
     */
    public function content(): string;

    /**
     * @return string
     */
    public function passphrase(): string;
}
