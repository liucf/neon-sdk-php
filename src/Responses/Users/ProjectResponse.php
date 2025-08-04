<?php

declare(strict_types=1);

namespace Neon\Responses\Users;

use Neon\Contracts\ResponseContract;
use Neon\Responses\Concerns\ArrayAccessible;
use Neon\Testing\Responses\Concerns\Fakeable;

final class ProjectResponse implements ResponseContract
{
    use ArrayAccessible;
    use Fakeable;

    private function __construct(
        public readonly string $id,
        public readonly string $platformId,
        public readonly string $regionId,
        public readonly string $name,
        public readonly string $provisioner,
        public readonly array $defaultEndpointSettings,
        public readonly int $pgVersion,
        public readonly bool $storePasswords,
        public readonly string $creationSource,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $proxyHost,
        public readonly int $branchLogicalSizeLimit,
        public readonly int $branchLogicalSizeLimitBytes,
        public readonly bool $storePassword,
        public readonly int $activeTime,
        public readonly int $computeTime,
        public readonly int $writtenDataBytes,
        public readonly int $dataTransferBytes,
        public readonly string $orgId,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['platform_id'],
            $attributes['region_id'],
            $attributes['name'],
            $attributes['provisioner'],
            $attributes['default_endpoint_settings'],
            $attributes['pg_version'],
            $attributes['store_passwords'],
            $attributes['creation_source'],
            $attributes['created_at'],
            $attributes['updated_at'],
            $attributes['proxy_host'],
            $attributes['branch_logical_size_limit'],
            $attributes['branch_logical_size_limit_bytes'],
            $attributes['store_password'],
            $attributes['active_time'],
            $attributes['compute_time'],
            $attributes['written_data_bytes'],
            $attributes['data_transfer_bytes'],
            $attributes['org_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'platform_id' => $this->platformId,
            'region_id' => $this->regionId,
            'name' => $this->name,
            'provisioner' => $this->provisioner,
            'default_endpoint_settings' => $this->defaultEndpointSettings,
            'pg_version' => $this->pgVersion,
            'store_passwords' => $this->storePasswords,
            'creation_source' => $this->creationSource,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'proxy_host' => $this->proxyHost,
            'branch_logical_size_limit' => $this->branchLogicalSizeLimit,
            'branch_logical_size_limit_bytes' => $this->branchLogicalSizeLimitBytes,
            'store_password' => $this->storePassword,
            'active_time' => $this->activeTime,
            'compute_time' => $this->computeTime,
            'written_data_bytes' => $this->writtenDataBytes,
            'data_transfer_bytes' => $this->dataTransferBytes,
            'org_id' => $this->orgId,
        ];
    }
}
