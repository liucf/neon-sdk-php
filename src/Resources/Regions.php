<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\ValueObjects\Transporter\Payload;

final class Regions
{
    use Concerns\Transportable;

    /**
     * List all regions.
     *
     * @see https://api-docs.neon.tech/reference/getactiveregions
     */
    public function list(): array
    {
        $payload = Payload::list('regions');

        return $this->transporter->request($payload);
    }
}
