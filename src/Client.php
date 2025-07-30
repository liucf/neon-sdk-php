<?php

declare(strict_types=1);

namespace Neon;

use Neon\Contracts\ClientContract;
use Neon\Contracts\TransporterContract;
use Neon\Resources\ApiKeys;
use Neon\Resources\Auth;
use Neon\Resources\Branches;
use Neon\Resources\Consumption;
use Neon\Resources\Endpoints;
use Neon\Resources\Operations;
use Neon\Resources\Organizations;
use Neon\Resources\Projects;
use Neon\Resources\Regions;
use Neon\Resources\Users;

final class Client implements ClientContract
{
    /**
     * Creates a Client instance with the given API token.
     */
    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * Returns the API keys resource.
     */
    public function apiKeys(): ApiKeys
    {
        return new ApiKeys($this->transporter);
    }

    /**
     * Returns the operations resource.
     */
    public function operations(): Operations
    {
        return new Operations($this->transporter);
    }

    /**
     * Returns the regions resource.
     */
    public function regions(): Regions
    {
        return new Regions($this->transporter);
    }

    /**
     * Returns the projects resource.
     */
    public function projects(): Projects
    {
        return new Projects($this->transporter);
    }

    /**
     * Returns the branches resource.
     */
    public function branches(): Branches
    {
        return new Branches($this->transporter);
    }

    /**
     * Returns the endpoints resource.
     */
    public function endpoints(): Endpoints
    {
        return new Endpoints($this->transporter);
    }

    /**
     * Returns the users resource.
     */
    public function users(): Users
    {
        return new Users($this->transporter);
    }

    /**
     * Returns the consumption resource.
     */
    public function consumption(): Consumption
    {
        return new Consumption($this->transporter);
    }

    /**
     * Returns the organizations resource.
     */
    public function organizations(): Organizations
    {
        return new Organizations($this->transporter);
    }

    /**
     * Auth resource
     */
    public function auth(): Resources\Auth
    {
        return new Resources\Auth($this->transporter);
    }

    /**
     * Data API resource
     */
    public function dataAPI(): Resources\DataAPI
    {
        return new Resources\DataAPI($this->transporter);
    }
}
