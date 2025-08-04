<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class OrganizationResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $createdAt,
        public readonly string $updatedAt,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['name'],
            $attributes['slug'],
            $attributes['created_at'],
            $attributes['updated_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
