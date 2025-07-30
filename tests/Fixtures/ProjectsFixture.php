<?php

function projectResource(): array
{
    return [
        'id' => 'royal-hall-11111111',
        'platform_id' => 'aws',
        'region_id' => 'aws-ap-southeast-2',
        'name' => 'test_projects',
        'provisioner' => 'k8s-neonvm',
        'default_endpoint_settings' => [
            'autoscaling_limit_min_cu' => 1,
            'autoscaling_limit_max_cu' => 2,
            'suspend_timeout_seconds' => 0,
        ],
        'settings' => [
            'allowed_ips' => [
                'ips' => [],
                'protected_branches_only' => false,
            ],
            'enable_logical_replication' => false,
            'maintenance_window' => [
                'weekdays' => [7],
                'start_time' => '18:00',
                'end_time' => '19:00',
            ],
            'block_public_connections' => false,
            'block_vpc_connections' => false,
            'hipaa' => false,
        ],
        'pg_version' => 17,
        'proxy_host' => 'ap-southeast-2.aws.neon.tech',
        'branch_logical_size_limit' => 512,
        'branch_logical_size_limit_bytes' => 536870912,
        'store_passwords' => true,
        'active_time' => 39128,
        'cpu_used_sec' => 38893,
        'creation_source' => 'console',
        'created_at' => '2025-07-17T00:44:17Z',
        'updated_at' => '2025-07-25T05:21:53Z',
        'synthetic_storage_size' => 71704208,
        'quota_reset_at' => '2025-08-01T00:00:00Z',
        'owner_id' => 'org-raspy-glade-1234567',
        'compute_last_active_at' => '2025-07-25T05:21:47Z',
        'org_id' => 'org-raspy-glade-1234567',
        'history_retention_seconds' => 86400,
    ];
}

function projectListResource(): array
{
    return [
        'projects' => [
            projectResource(),
            projectResource(),
        ],
        'pagination' => [
            'cursor' => '2025-07-27T01:45:32.898729Z',
        ],
        'application' => [],
        'integrations' => [],
    ];
}
