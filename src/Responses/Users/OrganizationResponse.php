<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class OrganizationResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    //     id
    // string
    // required
    // name
    // string
    // required
    // handle
    // string
    // required
    // plan
    // string
    // required
    // created_at
    // date-time
    // required
    // A timestamp indicting when the organization was created

    // managed_by
    // string
    // required
    // Organizations created via the Console or the API are managed by console.
    // Organizations created by other methods can't be deleted via the Console or the API.

    // updated_at
    // date-time
    // required
    // A timestamp indicating when the organization was updated

    // allow_hipaa_projects
    // boolean
    // If true, allow account to mark projects as HIPAA

    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $handle,
        public readonly string $plan,
        public readonly string $createdAt,
        public readonly string $managedBy,
        public readonly string $updatedAt,
        public readonly ?bool $allowHipaaProjects,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['name'],
            $attributes['handle'],
            $attributes['plan'],
            $attributes['created_at'],
            $attributes['managed_by'],
            $attributes['updated_at'],
            $attributes['allow_hipaa_projects'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'handle' => $this->handle,
            'plan' => $this->plan,
            'created_at' => $this->createdAt,
            'managed_by' => $this->managedBy,
            'updated_at' => $this->updatedAt,
            'allow_hipaa_projects' => $this->allowHipaaProjects,
        ];
    }
}
