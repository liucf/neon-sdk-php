<?php

namespace Neon\Contracts\Resources;

use Neon\Responses\ApiKeys\CreateResponse;
use Neon\Responses\ApiKeys\ListResponse;

interface ApiKeysContract
{
    /**
     * Creates an API key.
     *
     * @see https://api-docs.neon.tech/reference/createapikey
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse;

    /** 
     * List all API keys.
     *
     * @see https://api-docs.neon.tech/reference/listapikeys
     */
    public function list(): ListResponse;
}
