<?php

declare(strict_types=1);

namespace Neon\Responses\ApiKeys;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Responses\ApiKeys\RetrieveResponse;
use Neon\Testing\Responses\Concerns\Fakeable;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible, Fakeable;

    private function __construct(
        public readonly string $object,
        public readonly array $data
    ) {}

    public static function from(array $attributes): self
    {
        $data = array_map(fn(array $result): RetrieveResponse => RetrieveResponse::from(
            $result,
        ), $attributes['data']);

        return new self($attributes['object'], $data);
    }

    public function toArray(): array
    {
        return [
            'object' => $this->object,
            'data' => array_map(
                static fn(RetrieveResponse $response): array => $response->toArray(),
                $this->data,
            ),
        ];
    }
}
