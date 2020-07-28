<?php
declare(strict_types=1);

namespace Symflex\Component\OpenSSL\Contracts;

/**
 * Interface Encryption
 * @package Symflex\Component\OpenSSL\Contracts
 */
interface Encryption
{
    public function encrypt(string $data, $key);
    public function decrypt(
        string $data,
        string $method,
        string $key,
        int $options,
        string $iv,
        string $tag,
        string $aad
    ): string;

    public function pkcs7Encrypt(
        string $source,
        string $output,
        array $keys,
        array $headers,
        int $flag = 0,
        int $cipher = 0
    ): bool;

    public function pkcs7Decrypt(string $source, string $output, array $keys);
//openssl_pkcs7_decrypt ( string $infilename , string $outfilename , mixed $recipcert [, mixed $recipkey ] ) : bool
}
