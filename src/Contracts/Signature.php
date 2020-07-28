<?php

namespace Symflex\Component\OpenSSL\Contracts;

/**
 * Interface Signature
 * @package Symflex\Component\OpenSSL\Contracts
 */
interface Signature
{
    /**
     * @param string $data
     * @return string
     */
    public function sign(string $data): string;

    /**
     * @param string $data
     * @param string $signature
     * @return bool
     */
    public function verify(string $data, string $signature): bool;
}
