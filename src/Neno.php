<?php

declare(strict_types=1);

use Neon\Client;
use Neon\Factory;

final class Neon
{
    /**
     * Creates a new Neon Client with the given API token.
     */
    public static function client(string $apiKey): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
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
