<?php

declare(strict_types=1);

namespace Neon\Responses\Meta;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class CardResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $last4,
        public readonly ?string $brand,
        public readonly ?string $expMonth,
        public readonly ?string $expYear,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['last4'],
            $attributes['brand'] ?? null,
            $attributes['exp_month'] ?? null,
            $attributes['exp_year'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'last4' => $this->last4,
            'brand' => $this->brand,
            'exp_month' => $this->expMonth,
            'exp_year' => $this->expYear,
        ];
    }
}
