<?php

namespace Symflex\Component\OpenSSL\Tests\Unit;

trait KeySetUp
{
    protected $keyPassphrase;

    protected $publicKeyPath;

    protected $privateKeyPath;

    protected $publicKeyString;

    protected $privateKeyString;

    protected function setUp(): void
    {
        $this->keyPassphrase = 'test';
        $this->publicKeyPath = 'file://' . realpath(__DIR__ . '/../') . '/keys/pem/public.pem';
        $this->privateKeyPath = 'file://' . realpath(__DIR__ . '/../') . '/keys/pem/private.pem';

        $this->publicKeyString = file_get_contents($this->publicKeyPath);
        $this->privateKeyString = file_get_contents($this->privateKeyPath);
    }
}
