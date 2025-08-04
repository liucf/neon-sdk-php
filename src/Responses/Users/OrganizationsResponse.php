<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class OrganizationsResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly array $organizations,
    ) {}

    public static function from(array $attributes): self
    {
        $organizations = array_map(fn (array $result): OrganizationResponse => OrganizationResponse::from(
            $result,
        ), $attributes['organizations']);

        return new self(
            $organizations
        );
    }

    public function toArray(): array
    {
        return [
            'organizations' => array_map(fn (OrganizationResponse $response): array => $response->toArray(), $this->organizations),
        ];
    }
}
