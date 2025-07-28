<?php

declare(strict_types=1);

namespace Neon;

use Neon\Contracts\ClientContract;
use Neon\Contracts\TransporterContract;
use Neon\Resources\ApiKeys;

final class Client implements ClientContract
{

    /**
     * Creates a Client instance with the given API token.
     */
    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * Given a prompt, the model will return one or more predicted completions, and can also return the probabilities
     * of alternative tokens at each position.
     *
     * @see https://platform.openai.com/docs/api-reference/completions
     */
    public function ApiKeys(): ApiKeys
    {
        return new ApiKeys($this->transporter);
    }
}
