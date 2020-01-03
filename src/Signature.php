<?php

namespace Symflex\Component\OpenSSL;

/**
 * Interface Signature
 * @package Symflex\Component\OpenSSL
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
