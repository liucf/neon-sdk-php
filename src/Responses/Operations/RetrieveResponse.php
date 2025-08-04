<?php

declare(strict_types=1);

namespace Neon\Responses\Operations;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $id,
        public readonly string $projectId,
        public readonly ?string $branchId,
        public readonly ?string $endpointId,
        public readonly string $action,
        public readonly string $status,
        public readonly ?string $error,
        public readonly int $failuresCount,
        public readonly ?string $retryAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly int $totalDurationMs,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['project_id'],
            $attributes['branch_id'] ?? null,
            $attributes['endpoint_id'] ?? null,
            $attributes['action'],
            $attributes['status'],
            $attributes['error'] ?? null,
            $attributes['failures_count'],
            $attributes['retry_at'] ?? null,
            $attributes['created_at'],
            $attributes['updated_at'],
            $attributes['total_duration_ms']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'project_id' => $this->projectId,
            'branch_id' => $this->branchId,
            'endpoint_id' => $this->endpointId,
            'action' => $this->action,
            'status' => $this->status,
            'error' => $this->error,
            'failures_count' => $this->failuresCount,
            'retry_at' => $this->retryAt,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'total_duration_ms' => $this->totalDurationMs,
        ];
    }
}
