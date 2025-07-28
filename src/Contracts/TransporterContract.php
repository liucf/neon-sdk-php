<?php

declare(strict_types=1);

namespace Neon\Contracts;

use Neon\Exceptions\ErrorException;
use Neon\Exceptions\TransporterException;
use Neon\Exceptions\UnserializableResponse;
use Neon\ValueObjects\Transporter\Payload;
use Neon\ValueObjects\Transporter\Response;

/**
 * @internal
 */
interface TransporterContract
{
    /**
     * Sends a request to the Neon API.
     *
     * @return Response<array<array-key, mixed>|string>
     *
     * @throws ErrorException|TransporterException|UnserializableResponse
     */
    public function request(Payload $payload): Response;
}
