<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Contracts\TransporterContract;
use Neon\ValueObjects\Transporter\Payload;

final class Consumption
{
    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * Retrieves consumption metrics for Scale, Business, and Enterprise plan accounts.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getconsumptionhistoryperaccount
     */
    public function account(array $parameters = []): array
    {
        $payload = Payload::list('consumption_history/account', $parameters);

        return $this->transporter->request($payload);
    }

    /**
     * Retrieves consumption metrics for Scale, Business, and Enterprise plan projects.
     *
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     *
     * @see https://api-docs.neon.tech/reference/getconsumptionhistoryperproject
     */
    public function projects(array $parameters = []): array
    {
        $payload = Payload::list('consumption_history/projects', $parameters);

        return $this->transporter->request($payload);
    }
}
