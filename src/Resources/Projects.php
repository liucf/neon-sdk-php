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
     *
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
}
