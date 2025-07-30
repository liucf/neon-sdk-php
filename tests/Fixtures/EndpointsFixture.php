<?php

function endpointResource(): array
{
    return [
        'id' => 'ep-endpoint-123456',
        'project_id' => 'royal-hall-11111111',
        'branch_id' => 'br-branch-test-12345',
        'autoscaling_limit_min_cu' => 1,
        'autoscaling_limit_max_cu' => 2,
        'region_id' => 'aws-ap-southeast-2',
        'type' => 'read_write',
        'current_state' => 'active',
        'settings' => [
            'pg_settings' => [
                'shared_preload_libraries' => 'pg_stat_statements',
                'log_statement' => 'all',
            ],
        ],
        'pooler_enabled' => false,
        'pooler_mode' => 'transaction',
        'disabled' => false,
        'passwordless_access' => true,
        'last_active' => '2025-07-27T01:45:32.898729Z',
        'creation_source' => 'neon',
        'created_at' => '2025-07-27T01:45:32.898729Z',
        'updated_at' => '2025-07-27T01:45:32.898729Z',
        'proxy_host' => 'ap-southeast-2.aws.neon.tech',
        'host' => 'ep-endpoint-123456.ap-southeast-2.aws.neon.tech',
        'suspend_timeout_seconds' => 0,
        'provisioner' => 'k8s-neonvm',
    ];
}

function endpointListResource(): array
{
    return [
        'endpoints' => [
            endpointResource(),
            [
                'id' => 'ep-endpoint-987654',
                'project_id' => 'royal-hall-11111111',
                'branch_id' => 'br-main-12345',
                'autoscaling_limit_min_cu' => 0.25,
                'autoscaling_limit_max_cu' => 1,
                'region_id' => 'aws-ap-southeast-2',
                'type' => 'read_only',
                'current_state' => 'idle',
                'settings' => [
                    'pg_settings' => [],
                ],
                'pooler_enabled' => true,
                'pooler_mode' => 'session',
                'disabled' => false,
                'passwordless_access' => false,
                'last_active' => '2025-07-26T15:30:00.000000Z',
                'creation_source' => 'console',
                'created_at' => '2025-07-25T10:00:00.000000Z',
                'updated_at' => '2025-07-26T15:30:00.000000Z',
                'proxy_host' => 'ap-southeast-2.aws.neon.tech',
                'host' => 'ep-endpoint-987654.ap-southeast-2.aws.neon.tech',
                'suspend_timeout_seconds' => 300,
                'provisioner' => 'k8s-neonvm',
            ],
        ],
    ];
}

function endpointOperationResource(): array
{
    return [
        'endpoint' => endpointResource(),
        'operations' => [
            [
                'id' => 'op-operation-123456',
                'project_id' => 'royal-hall-11111111',
                'branch_id' => 'br-branch-test-12345',
                'endpoint_id' => 'ep-endpoint-123456',
                'action' => 'start_compute',
                'status' => 'running',
                'failures_count' => 0,
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
        ],
    ];
}
