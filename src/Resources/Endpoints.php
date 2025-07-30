<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Endpoints
{
    use Concerns\Transportable;

    /**
     * List compute endpoints.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/listprojectendpoints
     */
    public function list(string $projectId): array
    {
        $payload = Payload::list("projects/{$projectId}/endpoints");

        return $this->transporter->request($payload);
    }

    /**
     * Create a compute endpoint.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/createprojectendpoint
     */
    public function create(string $projectId, array $data): array
    {
        $payload = Payload::create("projects/{$projectId}/endpoints", $data);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieve compute endpoint details.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getprojectendpoint
     */
    public function retrieve(string $projectId, string $endpointId): array
    {
        $payload = Payload::retrieve("projects/{$projectId}/endpoints", $endpointId);

        return $this->transporter->request($payload);
    }

    /**
     * Update compute endpoint.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/updateprojectendpoint
     */
    public function update(string $projectId, string $endpointId, array $data): array
    {
        $payload = Payload::modify("projects/{$projectId}/endpoints", $endpointId, $data);

        return $this->transporter->request($payload);
    }

    /**
     * Delete compute endpoint.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/deleteprojectendpoint
     */
    public function delete(string $projectId, string $endpointId): array
    {
        $payload = Payload::delete("projects/{$projectId}/endpoints", $endpointId);

        return $this->transporter->request($payload);
    }

    /**
     * Start compute endpoint.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/startprojectendpoint
     */
    public function start(string $projectId, string $endpointId): array
    {
        $payload = Payload::create("projects/{$projectId}/endpoints/{$endpointId}/start", []);

        return $this->transporter->request($payload);
    }

    /**
     * Suspend compute endpoint.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/suspendprojectendpoint
     */
    public function suspend(string $projectId, string $endpointId): array
    {
        $payload = Payload::create("projects/{$projectId}/endpoints/{$endpointId}/suspend", []);

        return $this->transporter->request($payload);
    }

    /**
     * Restart compute endpoint.
     *
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/restartprojectendpoint
     */
    public function restart(string $projectId, string $endpointId): array
    {
        $payload = Payload::create("projects/{$projectId}/endpoints/{$endpointId}/restart", []);

        return $this->transporter->request($payload);
    }
}
