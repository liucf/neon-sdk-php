<?php

declare(strict_types=1);

namespace Neon\Responses\Operations;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class ListResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly array $data,
        public readonly array $pagination,
    ) {}

    public static function from(array $attributes): self
    {
        $data = array_map(fn (array $result): RetrieveResponse => RetrieveResponse::from(
            $result,
        ), $attributes['operations']);

        return new self(
            $data,
            $attributes['pagination'] ?? []
        );
    }

    public function toArray(): array
    {
        return [
            'operations' => array_map(fn (RetrieveResponse $response): array => $response->toArray(), $this->data),
            'pagination' => $this->pagination,
        ];
    }
}
