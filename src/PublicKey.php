<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL;

/**
 * Interface PublicKey
 * @package Symflex\Component\OpenSSL
 */
interface PublicKey
{
    /**
     * @return string
     */
    public function content(): string;
}
