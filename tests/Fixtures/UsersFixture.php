<?php

/**
 * Returns a user resource data structure for testing.
 */
function userResource(): array
{
    return [
        'id' => 'user-123456',
        'email' => 'user@example.com',
        'name' => 'John Doe',
        'image' => 'https://example.com/avatar.jpg',
        'login' => 'johndoe',
        'projects_limit' => 10,
        'branches_limit' => 100,
        'last_activity' => '2025-07-27T01:45:32.898729Z',
        'created_at' => '2025-01-15T10:30:00.000000Z',
        'plan' => 'pro',
        'billing_account' => [
            'id' => 'billing-123456',
            'name' => 'My Organization',
            'plan' => 'pro',
        ],
    ];
}

/**
 * Returns a user organizations list resource for testing.
 */
function userOrganizationsResource(): array
{
    return [
        'organizations' => [
            [
                'id' => 'org-123456',
                'name' => 'My Company',
                'slug' => 'my-company',
                'created_at' => '2025-01-10T10:00:00.000000Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
            [
                'id' => 'org-789012',
                'name' => 'My Startup',
                'slug' => 'my-startup',
                'created_at' => '2025-02-15T14:30:00.000000Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
            ],
        ],
    ];
}

/**
 * Returns a project transfer response for testing.
 */
function userTransferProjectsResource(): array
{
    return [
        'projects' => [
            [
                'id' => 'royal-hall-11111111',
                'platform_id' => 'aws',
                'region_id' => 'ap-southeast-2',
                'name' => 'transferred-project-1',
                'provisioner' => 'k8s-pod',
                'default_endpoint_settings' => [
                    'autoscaling_limit_min_cu' => 1,
                    'autoscaling_limit_max_cu' => 2,
                    'suspend_timeout_seconds' => 0,
                ],
                'pg_version' => 16,
                'store_passwords' => true,
                'creation_source' => 'console',
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'updated_at' => '2025-07-27T01:45:32.898729Z',
                'proxy_host' => 'ap-southeast-2.aws.neon.tech',
                'branch_logical_size_limit' => 204800,
                'branch_logical_size_limit_bytes' => 214748364800,
                'store_password' => true,
                'active_time' => 3600,
                'compute_time' => 1800,
                'written_data_bytes' => 1073741824,
                'data_transfer_bytes' => 536870912,
                'org_id' => 'org-123456',
            ],
        ],
    ];
}

/**
 * Returns auth details resource for testing.
 */
function userAuthDetailsResource(): array
{
    return [
        'type' => 'api_key',
        'user_id' => 'user-123456',
        'api_key_id' => 'ak-123456789',
        'created_at' => '2025-07-27T01:45:32.898729Z',
        'expires_at' => '2025-12-31T23:59:59.000000Z',
        'scopes' => ['read', 'write'],
        'last_used_at' => '2025-07-27T01:45:32.898729Z',
        'last_used_from_addr' => '192.168.1.100',
    ];
}
