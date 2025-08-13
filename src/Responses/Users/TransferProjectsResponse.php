<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class TransferProjectsResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
    ) {}

    public static function from(array $attributes): self
    {
        return new self;
    }

    public function toArray(): array
    {
        return [];
    }
}
