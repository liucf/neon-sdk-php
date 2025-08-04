<?php

declare(strict_types=1);

namespace Neon\Responses\Regions;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $regionId,
        public readonly string $name,
        public readonly bool $default,
        public readonly string $geoLat,
        public readonly string $geoLong,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['region_id'],
            $attributes['name'],
            $attributes['default'],
            $attributes['geo_lat'],
            $attributes['geo_long'],
        );
    }

    public function toArray(): array
    {
        return [
            'region_id' => $this->regionId,
            'name' => $this->name,
            'default' => $this->default,
            'geo_lat' => $this->geoLat,
            'geo_long' => $this->geoLong,
        ];
    }
}
