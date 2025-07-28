<?php

declare(strict_types=1);

namespace Neon\Responses\ApiKeys;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    private function __construct(
        public readonly string $id,
        public readonly string $key,
        public readonly string $name,
        public readonly string $createdAt,
        public readonly string $createdBy
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['key'],
            $attributes['name'],
            $attributes['created_at'],
            $attributes['created_by']
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'created_at' => $this->createdAt,
            'created_by' => $this->createdBy
        ], fn(mixed $value): bool => ! is_null($value));
    }
}
