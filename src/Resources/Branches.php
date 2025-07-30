<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Branches
{
    use Concerns\Transportable;

    /**
     * List branches.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectbranches
     */
    public function list(string $projectId, array $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/branches", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Create a branch.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/createprojectbranch
     */
    public function create(string $projectId, array $data = []): array
    {
        $payload = Payload::create("projects/{$projectId}/branches", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve number of branches.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/countprojectbranches
     */
    public function count(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/count");

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve branch details.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectbranch
     */
    public function retrieve(string $projectId, string $branchId): array
    {
        $payload = Payload::retrieve("projects/{$projectId}/branches", $branchId);

        return $this->transporter->request($payload);
    }

    /**
     * Update branch.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/updateprojectbranch
     */
    public function update(string $projectId, string $branchId, array $data): array
    {
        $payload = Payload::modify("projects/{$projectId}/branches", $branchId, $data);

        return $this->transporter->request($payload);
    }

    /**
     * Delete branch.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/deleteprojectbranch
     */
    public function delete(string $projectId, string $branchId): array
    {
        $payload = Payload::delete("projects/{$projectId}/branches", $branchId);

        return $this->transporter->request($payload);
    }

    /**
     * Restore branch.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/restoreprojectbranch
     */
    public function restore(string $projectId, string $branchId, array $data): array
    {
        $payload = Payload::create("projects/{$projectId}/branches/{$branchId}/restore", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Set branch as default.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/setdefaultprojectbranch
     */
    public function setAsDefault(string $projectId, string $branchId): array
    {
        $payload = Payload::create("projects/{$projectId}/branches/{$branchId}/set_as_default", []);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve database schema.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectbranchschema
     */
    public function getSchema(string $projectId, string $branchId, array $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/schema", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Compare database schema.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectbranchschemacomparison
     */
    public function compareSchema(string $projectId, string $branchId, array $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/schema/compare", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List branch endpoints.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectbranchendpoints
     */
    public function listEndpoints(string $projectId, string $branchId): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/endpoints");

        return $this->transporter->request($payload);
    }

    /**
     * List databases.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectbranchdatabases
     */
    public function listDatabases(string $projectId, string $branchId): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/databases");

        return $this->transporter->request($payload);
    }

    /**
     * List roles.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectbranchroles
     */
    public function listRoles(string $projectId, string $branchId): array
    {
        $payload = Payload::list("projects/{$projectId}/branches/{$branchId}/roles");

        return $this->transporter->request($payload);
    }
}
