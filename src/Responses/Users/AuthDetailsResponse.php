<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class AuthDetailsResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $type,
        public readonly string $userId,
        public readonly string $apiKeyId,
        public readonly string $createdAt,
        public readonly ?string $expiresAt,
        public readonly array $scopes,
        public readonly ?string $lastUsedAt,
        public readonly ?string $lastUsedFromAddr,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
            $attributes['user_id'],
            $attributes['api_key_id'],
            $attributes['created_at'],
            $attributes['expires_at'] ?? null,
            $attributes['scopes'],
            $attributes['last_used_at'] ?? null,
            $attributes['last_used_from_addr'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'user_id' => $this->userId,
            'api_key_id' => $this->apiKeyId,
            'created_at' => $this->createdAt,
            'expires_at' => $this->expiresAt,
            'scopes' => $this->scopes,
            'last_used_at' => $this->lastUsedAt,
            'last_used_from_addr' => $this->lastUsedFromAddr,
        ];
    }
}
