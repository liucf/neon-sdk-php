<?php

declare(strict_types=1);

namespace Neon\Responses\Meta;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class PaymentSourceResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $type,
        public readonly ?CardResponse $card,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
            isset($attributes['card'])
                ? CardResponse::from($attributes['card'])
                : null,
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'card' => $this->card?->toArray(),
        ];
    }
}
