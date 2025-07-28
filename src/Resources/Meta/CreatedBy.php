<?php

declare(strict_types=1);

namespace Neon\Resources\Meta;

use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Contracts\ResponseContract;

final class CreatedBy implements ResponseContract
{
    use ArrayAccessible;

    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $image,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['name'],
            $attributes['image'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
        ];
    }
}
