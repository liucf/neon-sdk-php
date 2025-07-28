<?php

declare(strict_types=1);

namespace Neon\Resources\Concerns;

use Neon\Contracts\TransporterContract;

trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        //
    }
}
