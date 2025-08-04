<?php

declare(strict_types=1);

namespace Neon\Responses\ApiKeys;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Responses\Meta\CreatedByResponse;
use Neon\Testing\Responses\Concerns\Fakeable;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $createdAt,
        public readonly CreatedByResponse $createdBy,
        public readonly ?string $lastUsedAt,
        public readonly ?string $lastUsedFromAddr,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['name'],
            $attributes['created_at'],
            CreatedByResponse::from($attributes['created_by']),
            $attributes['last_used_at'] ?? null,
            $attributes['last_used_from_addr'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->createdAt,
            'created_by' => $this->createdBy->toArray(),
            'last_used_at' => $this->lastUsedAt,
            'last_used_from_addr' => $this->lastUsedFromAddr,
        ];
    }
}
