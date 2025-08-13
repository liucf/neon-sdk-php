<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class AuthDetailsResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $accountId,
        public readonly string $authMethod,
        public readonly ?string $authData,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['account_id'],
            $attributes['auth_method'],
            $attributes['auth_data'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId,
            'auth_method' => $this->authMethod,
            'auth_data' => $this->authData,
        ];
    }
}
