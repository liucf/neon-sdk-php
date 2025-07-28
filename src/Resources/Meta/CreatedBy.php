<?php

declare(strict_types=1);

namespace Neon\Resources\Meta;

final class CreatedBy
{
    public function __construct(
    ) {
    }

    public static function from(array $attributes): array
    {
        return [
            'id' => $attributes['id'],
            'name' => $attributes['name'],
            'image' => $attributes['image'],
        ];
    }
}
