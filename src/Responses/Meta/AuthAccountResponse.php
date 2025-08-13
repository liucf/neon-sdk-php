<?php

declare(strict_types=1);

namespace Neon\Responses\Meta;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class AuthAccountResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $email,
        public readonly string $image,
        public readonly string $login,
        public readonly string $name,
        public readonly string $provider,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['email'],
            $attributes['image'],
            $attributes['login'],
            $attributes['name'],
            $attributes['provider'],
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'image' => $this->image,
            'login' => $this->login,
            'name' => $this->name,
            'provider' => $this->provider,
        ];
    }
}
