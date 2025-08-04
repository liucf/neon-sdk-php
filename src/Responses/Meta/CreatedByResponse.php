<?php

namespace Neon\Responses\Meta;

final class CreatedByResponse
{
    private function __construct(
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
