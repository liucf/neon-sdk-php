<?php

declare(strict_types=1);

use Neon\Client;
use Neon\Factory;

final class Neon
{
    /**
     * The current SDK version.
     */
    public const VERSION = '0.1.0';

    /**
     * Creates a new Neon Client with the given API token.
     */
    public static function client(string $apiKey): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->withBaseUri(getenv('NEON_BASE_URL') ?: 'console.neon.tech/api/v2')
            ->make();
    }

    /**
     * Creates a new factory instance to configure a custom Open AI Client
     */
    public static function factory(): Factory
    {
        return new Factory;
    }
}
