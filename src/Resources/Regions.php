<?php

declare(strict_types=1);

namespace Neon\Resources;

use Neon\Responses\Regions\ListResponse;
use Neon\ValueObjects\Transporter\Payload;

final class Regions
{
    use Concerns\Transportable;

    /**
     * List all regions.
     *
     * @see https://api-docs.neon.tech/reference/getactiveregions
     */
    public function list(): ListResponse
    {
        $payload = Payload::list('regions');

        $response = $this->transporter->request($payload);

        return ListResponse::from($response->data());
    }
}
