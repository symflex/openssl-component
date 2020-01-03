<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL;

/**
 * Interface PrivateKey
 * @package Symflex\Component\OpenSSL
 */
interface PrivateKey
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
