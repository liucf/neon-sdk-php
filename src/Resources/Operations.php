<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Operations
{
    use Concerns\Transportable;

    /**
     * List all operations.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectoperations
     */
    public function list(string $projectId, array $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/operations", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve an operation.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectoperation
     */
    public function retrieve(string $projectId, string $operationId): array
    {
        $payload = Payload::retrieve("projects/{$projectId}/operations", $operationId);

        return $this->transporter->request($payload);
    }
}
