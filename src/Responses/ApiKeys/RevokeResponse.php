<?php

declare(strict_types=1);

namespace Neon\Responses\ApiKeys;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class RevokeResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $createdAt,
        public readonly string $createdBy,
        public readonly ?string $lastUsedAt,
        public readonly ?string $lastUsedFromAddr,
        public readonly bool $revoked,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['name'],
            $attributes['created_at'],
            $attributes['created_by'],
            $attributes['last_used_at'] ?? null,
            $attributes['last_used_from_addr'] ?? null,
            $attributes['revoked'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->createdAt,
            'created_by' => $this->createdBy,
            'last_used_at' => $this->lastUsedAt,
            'last_used_from_addr' => $this->lastUsedFromAddr,
            'revoked' => $this->revoked,
        ];
    }
}
