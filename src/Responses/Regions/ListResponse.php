<?php

declare(strict_types=1);

namespace Neon\Responses\Regions;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly array $data,
    ) {}

    public static function from(array $attributes): self
    {
        $data = array_map(fn (array $result): RetrieveResponse => RetrieveResponse::from(
            $result,
        ), $attributes);

        return new self(
            $data
        );
    }

    public function toArray(): array
    {
        return array_map(fn (RetrieveResponse $response): array => $response->toArray(), $this->data);
    }
}
