<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class DataAPI
{
    use Concerns\Transportable;

    /**
     * Create Neon Data API
     *
     * Creates a new instance of Neon Data API in the specified branch.
     * You can obtain the project_id and branch_id by listing the projects and branches for your Neon account.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    public function create(string $projectId, string $branchId, array $parameters = []): array
    {
        $payload = Payload::create("projects/{$projectId}/branches/{$branchId}/data-api", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Get Neon Data API
     *
     * Retrieves the Neon Data API for the specified branch.
     *
     * @return array<string, mixed>
     */
    public function get(string $projectId, string $branchId): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/data-api");

        return $this->transporter->request($payload);
    }

    /**
     * Delete Neon Data API
     *
     * Deletes the Neon Data API for the specified branch.
     * You can obtain the project_id and branch_id by listing the projects and branches for your Neon account.
     *
     * @return array<string, mixed>
     */
    public function delete(string $projectId, string $branchId): array
    {
        $payload = Payload::deleteWithBody("projects/{$projectId}/branches/{$branchId}/data-api");

        return $this->transporter->request($payload);
    }
}
