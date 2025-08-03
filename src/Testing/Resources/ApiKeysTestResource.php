<?php

namespace Neon\Testing\Resources;

use Neon\Contracts\Resources\ApiKeysContract;
use Neon\Resources\Files;
use Neon\Responses\Files\CreateResponse;
use Neon\Responses\Files\DeleteResponse;
use Neon\Responses\Files\ListResponse;
use Neon\Responses\Files\RetrieveResponse;
use Neon\Testing\Resources\Concerns\Testable;

final class FilesTestResource implements ApiKeysContract
{
    use Testable;

    protected function resource(): string
    {
        return Files::class;
    }

    public function list(array $parameters = []): ListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $file): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function download(string $file): string
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function upload(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $file): DeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
