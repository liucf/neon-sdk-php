<?php

function branchResource(): array
{
    return [
        'id' => 'br-branch-test-12345',
        'project_id' => 'royal-hall-11111111',
        'parent_id' => 'br-main-12345',
        'parent_lsn' => '0/1E83318',
        'name' => 'test-branch',
        'current_state' => 'ready',
        'logical_size' => 28212224,
        'creation_source' => 'api',
        'primary' => false,
        'cpu_used_sec' => 0,
        'active_time' => 0,
        'written_data_bytes' => 0,
        'data_transfer_bytes' => 0,
        'created_at' => '2025-07-27T01:45:32.898729Z',
        'updated_at' => '2025-07-27T01:45:32.898729Z',
    ];
}

function branchListResource(): array
{
    return [
        'branches' => [
            branchResource(),
            [
                'id' => 'br-main-12345',
                'project_id' => 'royal-hall-11111111',
                'parent_id' => null,
                'parent_lsn' => null,
                'name' => 'main',
                'current_state' => 'ready',
                'logical_size' => 28212224,
                'creation_source' => 'neon',
                'primary' => true,
                'cpu_used_sec' => 1234,
                'active_time' => 5678,
                'written_data_bytes' => 1048576,
                'data_transfer_bytes' => 2097152,
                'created_at' => '2025-07-17T00:44:17Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
        ],
        'pagination' => [
            'cursor' => '2025-07-27T01:45:32.898729Z',
        ],
    ];
}

function branchCountResource(): array
{
    return [
        'count' => 2,
    ];
}

function branchSchemaResource(): array
{
    return [
        'sql' => 'CREATE TABLE users (id SERIAL PRIMARY KEY, name VARCHAR(255));',
    ];
}

function branchEndpointsResource(): array
{
    return [
        'endpoints' => [
            [
                'id' => 'ep-endpoint-123456',
                'project_id' => 'royal-hall-11111111',
                'branch_id' => 'br-branch-test-12345',
                'autoscaling_limit_min_cu' => 1,
                'autoscaling_limit_max_cu' => 2,
                'region_id' => 'aws-ap-southeast-2',
                'type' => 'read_write',
                'current_state' => 'active',
                'settings' => [
                    'pg_settings' => [],
                ],
                'pooler_enabled' => false,
                'pooler_mode' => 'transaction',
                'disabled' => false,
                'passwordless_access' => true,
                'creation_source' => 'neon',
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
                'proxy_host' => 'ap-southeast-2.aws.neon.tech',
                'host' => 'ep-endpoint-123456.ap-southeast-2.aws.neon.tech',
                'suspend_timeout_seconds' => 0,
            ],
        ],
    ];
}

function branchDatabasesResource(): array
{
    return [
        'databases' => [
            [
                'id' => 123456,
                'branch_id' => 'br-branch-test-12345',
                'name' => 'main',
                'owner_name' => 'test_user',
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
            [
                'id' => 123457,
                'branch_id' => 'br-branch-test-12345',
                'name' => 'testdb',
                'owner_name' => 'test_user',
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
        ],
    ];
}

function branchRolesResource(): array
{
    return [
        'roles' => [
            [
                'branch_id' => 'br-branch-test-12345',
                'name' => 'test_user',
                'password' => '***',
                'protected' => false,
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
            [
                'branch_id' => 'br-branch-test-12345',
                'name' => 'web_access',
                'password' => '***',
                'protected' => false,
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
        ],
    ];
}
