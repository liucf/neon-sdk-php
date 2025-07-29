<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class ApiKeys
{
    use Concerns\Transportable;

    /**
     * Creates an API key.
     *
     * @see https://api-docs.neon.tech/reference/createapikey
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function create(array $parameters): array
    {
        $payload = Payload::create('api_keys', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List all API keys.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listapikeys
     */
    public function list(): array
    {
        $payload = Payload::list('api_keys');

        return $this->transporter->request($payload);
    }

    /**
     * Revoke API key
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/revokeapikey
     */
    public function revoke(string $id): array
    {
        $payload = Payload::delete('api_keys', $id);

        return $this->transporter->request($payload);
    }
}
