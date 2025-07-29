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
     * @see https://api-docs.neon.tech/reference/listprojectoperations
     */
    public function list(string $projectId, $parameters = []): array
    {
        $payload = Payload::list("projects/{$projectId}/operations", $parameters);

        return $this->transporter->request($payload);
    }
}
