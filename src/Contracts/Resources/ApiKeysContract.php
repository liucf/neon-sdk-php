<?php

namespace Neon\Contracts\Resources;

interface ApiKeysContract
{
    /**
     * Creates an API key.
     *
     * @see https://api-docs.neon.tech/reference/createapikey
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): array;

    /**
     * List all API keys.
     *
     * @see https://api-docs.neon.tech/reference/listapikeys
     */
    public function list(): array;
}
