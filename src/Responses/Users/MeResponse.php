<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class MeResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $id,
        public readonly string $email,
        public readonly string $name,
        public readonly ?string $image,
        public readonly string $login,
        public readonly int $projectsLimit,
        public readonly int $branchesLimit,
        public readonly ?string $lastActivity,
        public readonly string $createdAt,
        public readonly string $plan,
        public readonly BillingAccountResponse $billingAccount,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['email'],
            $attributes['name'],
            $attributes['image'] ?? null,
            $attributes['login'],
            $attributes['projects_limit'],
            $attributes['branches_limit'],
            $attributes['last_activity'] ?? null,
            $attributes['created_at'],
            $attributes['plan'],
            BillingAccountResponse::from($attributes['billing_account']),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'image' => $this->image,
            'login' => $this->login,
            'projects_limit' => $this->projectsLimit,
            'branches_limit' => $this->branchesLimit,
            'last_activity' => $this->lastActivity,
            'created_at' => $this->createdAt,
            'plan' => $this->plan,
            'billing_account' => $this->billingAccount->toArray(),
        ];
    }
}
