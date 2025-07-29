<?php

declare(strict_types=1);

namespace Neon;

use Neon\Contracts\ClientContract;
use Neon\Contracts\TransporterContract;
use Neon\Resources\ApiKeys;
use Neon\Resources\Regions;

final class Client implements ClientContract
{
    /**
     * Creates a Client instance with the given API token.
     */
    public function __construct(private readonly TransporterContract $transporter)
    {
    }

    /**
     * Returns the API keys resource.
     */
    public function apiKeys(): ApiKeys
    {
        return new ApiKeys($this->transporter);
    }

    /**
     * Returns the regions resource.
     */
    public function regions(): Regions
    {
        return new Regions($this->transporter);
    }
}
