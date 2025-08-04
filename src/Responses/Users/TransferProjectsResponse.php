<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class TransferProjectsResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly array $projects,
    ) {}

    public static function from(array $attributes): self
    {
        $projects = array_map(fn (array $result): ProjectResponse => ProjectResponse::from(
            $result,
        ), $attributes['projects']);

        return new self(
            $projects
        );
    }

    public function toArray(): array
    {
        return [
            'projects' => array_map(fn (ProjectResponse $response): array => $response->toArray(), $this->projects),
        ];
    }
}
