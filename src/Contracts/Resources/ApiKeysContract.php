<?php

namespace Neon\Contracts\Resources;

use Neon\Responses\ApiKeys\CreateResponse;
use Neon\Responses\ApiKeys\DeleteResponse;
use Neon\Responses\ApiKeys\ListResponse;

interface ApiKeysContract
{
    public function create(): CreateResponse;

    public function list(): ListResponse;

    public function revoke(int $id): DeleteResponse;
}
