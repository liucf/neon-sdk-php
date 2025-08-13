<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Responses\Meta\AuthAccountResponse;
use Neon\Testing\Responses\Concerns\Fakeable;

final class MeResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly int $activeSecondsLimit,
        public readonly ?BillingAccountResponse $billingAccount,
        public readonly array $authAccounts,
        public readonly string $email,
        public readonly string $id,
        public readonly string $image,
        public readonly string $login,
        public readonly string $name,
        public readonly string $lastName,
        public readonly int $projectsLimit,
        public readonly int $branchesLimit,
        public readonly float $maxAutoscalingLimit,
        public readonly ?float $computeSecondsLimit,
        public readonly string $plan,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['active_seconds_limit'],
            isset($attributes['billing_account'])
                ? BillingAccountResponse::from($attributes['billing_account'])
                : null,
            array_map(fn ($authAccount) => AuthAccountResponse::from($authAccount), $attributes['auth_accounts']),
            $attributes['email'],
            $attributes['id'],
            $attributes['image'],
            $attributes['login'],
            $attributes['name'],
            $attributes['last_name'],
            $attributes['projects_limit'],
            $attributes['branches_limit'],
            $attributes['max_autoscaling_limit'],
            $attributes['compute_seconds_limit'] ?? null,
            $attributes['plan'],
        );
    }

    public function toArray(): array
    {
        return [
            'active_seconds_limit' => $this->activeSecondsLimit,
            'billing_account' => $this->billingAccount?->toArray(),
            'auth_accounts' => array_map(fn ($authAccount) => $authAccount->toArray(), $this->authAccounts),
            'email' => $this->email,
            'id' => $this->id,
            'image' => $this->image,
            'login' => $this->login,
            'name' => $this->name,
            'last_name' => $this->lastName,
            'projects_limit' => $this->projectsLimit,
            'branches_limit' => $this->branchesLimit,
            'max_autoscaling_limit' => $this->maxAutoscalingLimit,
            'compute_seconds_limit' => $this->computeSecondsLimit,
            'plan' => $this->plan,
        ];
    }
}
