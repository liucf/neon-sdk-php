<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Contracts\Resources\ApiKeysContract;
use Neon\Responses\ApiKeys\CreateResponse;
use Neon\Responses\ApiKeys\ListResponse;
use Neon\ValueObjects\Transporter\Payload;

final class ApiKeys implements ApiKeysContract
{
    use Concerns\Transportable;

    /**
     * Creates an API key.
     *
     * @see https://api-docs.neon.tech/reference/createapikey
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('api_keys', $parameters);
        $response = $this->transporter->request($payload);
        return CreateResponse::from($response->data());
    }

    /**
     * List all API keys.
     *
     * @see https://api-docs.neon.tech/reference/listapikeys
     */
    public function list(): ListResponse
    {
        $payload = Payload::list('api_keys');
        $response = $this->transporter->request($payload);
        return ListResponse::from($response->data());
    }
}
