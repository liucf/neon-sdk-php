<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Responses\Meta\PaymentSourceResponse;
use Neon\Testing\Responses\Concerns\Fakeable;

final class BillingAccountResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $state,
        public readonly PaymentSourceResponse $paymentSource,
        public readonly string $subscriptionType,
        public readonly string $paymentMethod,
        public readonly string $quotaResetAtLast,
        public readonly string $name,
        public readonly string $email,
        public readonly string $addressCity,
        public readonly string $addressCountry,
        public readonly ?string $addressCountryName,
        public readonly string $addressLine1,
        public readonly string $addressLine2,
        public readonly string $addressPostalCode,
        public readonly string $addressState,
        public readonly ?string $orbPortalUrl,
        public readonly ?string $taxId,
        public readonly ?string $taxIdType,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['state'],
            PaymentSourceResponse::from($attributes['payment_source']),
            $attributes['subscription_type'],
            $attributes['payment_method'],
            $attributes['quota_reset_at_last'],
            $attributes['name'],
            $attributes['email'],
            $attributes['address_city'],
            $attributes['address_country'],
            $attributes['address_country_name'] ?? null,
            $attributes['address_line1'],
            $attributes['address_line2'],
            $attributes['address_postal_code'],
            $attributes['address_state'],
            $attributes['orb_portal_url'] ?? null,
            $attributes['tax_id'] ?? null,
            $attributes['tax_id_type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'state' => $this->state,
            'payment_source' => $this->paymentSource->toArray(),
            'subscription_type' => $this->subscriptionType,
            'payment_method' => $this->paymentMethod,
            'quota_reset_at_last' => $this->quotaResetAtLast,
            'name' => $this->name,
            'email' => $this->email,
            'address_city' => $this->addressCity,
            'address_country' => $this->addressCountry,
            'address_country_name' => $this->addressCountryName,
            'address_line1' => $this->addressLine1,
            'address_line2' => $this->addressLine2,
            'address_postal_code' => $this->addressPostalCode,
            'address_state' => $this->addressState,
            'orb_portal_url' => $this->orbPortalUrl,
            'tax_id' => $this->taxId,
            'tax_id_type' => $this->taxIdType,
        ];
    }
}
