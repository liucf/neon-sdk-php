<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Projects
{
    use Concerns\Transportable;

    /**
     * List all projects.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojects
     */
    public function list(array $parameters = []): array
    {
        $payload = Payload::list('projects', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Create a project.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/createproject
     */
    public function create(array $data): array
    {
        $payload = Payload::create('projects', $data);

        return $this->transporter->request($payload);
    }

    /**
     * List shared projects
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listsharedprojects
     */
    public function listShared(array $parameters = []): array
    {
        $payload = Payload::list('projects/shared', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve project details.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getproject
     */
    public function retrieve(string $id): array
    {
        $payload = Payload::retrieve('projects', $id);

        return $this->transporter->request($payload);
    }

    /**
     * Update project details.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/updateproject
     */
    public function update(string $id, array $data): array
    {
        $payload = Payload::modify('projects', $id, $data);

        return $this->transporter->request($payload);
    }

    /**
     * Delete a project.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/deleteproject
     */
    public function delete(string $id): array
    {
        $payload = Payload::delete('projects', $id);

        return $this->transporter->request($payload);
    }

    /**
     * List project access.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectpermissions
     */
    public function listPermissions(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/permissions");

        return $this->transporter->request($payload);
    }

    /**
     * Grant project access.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/grantpermissiontoproject
     */
    public function grantPermission(string $projectId, array $data): array
    {
        $payload = Payload::create("projects/{$projectId}/permissions", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Revoke project access.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/revokepermissionfromproject
     */
    public function revokePermission(string $projectId, string $permissionId): array
    {
        $payload = Payload::delete("projects/{$projectId}/permissions", $permissionId);

        return $this->transporter->request($payload);
    }

    /**
     * Return available shared preload libraries.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getavailablepreloadlibraries
     */
    public function getAvailablePreloadLibraries(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/available_preload_libraries");

        return $this->transporter->request($payload);
    }

    /**
     * Create a project transfer request.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/createprojecttransferrequest
     */
    public function createTransferRequest(string $projectId, array $data = []): array
    {
        $payload = Payload::create("projects/{$projectId}/transfer_requests", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Accept a project transfer request.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/acceptprojecttransferrequest
     */
    public function acceptTransferRequest(string $projectId, string $requestId, array $data = []): array
    {
        $payload = Payload::modify("projects/{$projectId}/transfer_requests", $requestId, $data);

        return $this->transporter->request($payload);
    }

    /**
     * List JWKS URLs.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectjwks
     */
    public function listJwks(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/jwks");

        return $this->transporter->request($payload);
    }

    /**
     * Add JWKS URL.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/addprojectjwks
     */
    public function addJwks(string $projectId, array $data): array
    {
        $payload = Payload::create("projects/{$projectId}/jwks", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Delete JWKS URL.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/deleteprojectjwks
     */
    public function deleteJwks(string $projectId, string $jwksId): array
    {
        $payload = Payload::delete("projects/{$projectId}/jwks", $jwksId);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve connection URI.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getconnectionuri
     */
    public function getConnectionUri(string $projectId, array $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/connection_uri", $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * List VPC endpoint restrictions.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectvpcendpoints
     */
    public function listVpcEndpoints(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/vpc_endpoints");

        return $this->transporter->request($payload);
    }

    /**
     * Set VPC endpoint restriction.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/assignprojectvpcendpoint
     */
    public function setVpcEndpoint(string $projectId, string $vpcEndpointId, array $data = []): array
    {
        $payload = Payload::create("projects/{$projectId}/vpc_endpoints/{$vpcEndpointId}", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Delete VPC endpoint restriction.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/deleteprojectvpcendpoint
     */
    public function deleteVpcEndpoint(string $projectId, string $vpcEndpointId): array
    {
        $payload = Payload::delete("projects/{$projectId}/vpc_endpoints", $vpcEndpointId);

        return $this->transporter->request($payload);
    }
}
