<?php

namespace Symflex\Component\OpenSSL\Contracts;

/**
 * Interface PublicKey
 * @package Symflex\Component\OpenSSL\Contracts
 */
interface Key
{
    /**
     * @return string
     */
    public function content(): string;
}
