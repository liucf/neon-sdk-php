<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Responses\Operations\ListResponse;
use Neon\Responses\Operations\RetrieveResponse;
use Neon\ValueObjects\Transporter\Payload;

final class Operations
{
    use Concerns\Transportable;

    /**
     * List all operations.
     *
     * @param  array<string, mixed>  $parameters
     *
     * @see https://api-docs.neon.tech/reference/listprojectoperations
     */
    public function list(string $projectId, array $parameters = []): ListResponse
    {
        $payload = Payload::list("projects/{$projectId}/operations", $parameters);

        $response = $this->transporter->request($payload);

        return ListResponse::from($response->data());
    }

    /**
     * Retrieve an operation.
     *
     * @see https://api-docs.neon.tech/reference/getprojectoperation
     */
    public function retrieve(string $projectId, string $operationId): RetrieveResponse
    {
        $payload = Payload::retrieve("projects/{$projectId}/operations", $operationId);

        $response = $this->transporter->request($payload);

        return RetrieveResponse::from($response->data());
    }
}
