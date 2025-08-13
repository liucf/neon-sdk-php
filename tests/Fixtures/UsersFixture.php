<?php

/**
 * Returns a user resource data structure for testing.
 */
function userResource(): array
{
    return [
        'active_seconds_limit' => 0,
        'auth_accounts' => [
            [
                'provider' => 'google',
                'email' => 'user@example.com',
                'name' => 'John Doe',
                'image' => 'https://example.com/avatar.jpg',
                'login' => 'johndoe',
            ],
            [
                'provider' => 'keycloak',
                'email' => 'user@example.com',
                'name' => 'John Doe',
                'image' => 'https://example.com/avatar.jpg',
                'login' => 'johndoe',
            ],
        ],
        'id' => 'user-123456',
        'email' => 'user@example.com',
        'name' => 'John Doe',
        'image' => 'https://example.com/avatar.jpg',
        'login' => 'johndoe',
        'last_name' => 'Doe',
        'projects_limit' => 10,
        'branches_limit' => 100,
        'max_autoscaling_limit' => 0,
        'plan' => 'free_v2',
    ];
}

function userOrganizationResource(): array
{
    return [
        'id' => 'org-123456',
        'name' => 'My Company',
        'handle' => 'my-company',
        'plan' => 'free',
        'created_at' => '2025-01-10T10:00:00.000000Z',
        'managed_by' => 'console',
        'updated_at' => '2025-07-27T01:45:32.898729Z',
        'allow_hipaa_projects' => true,
    ];
}

/**
 * Returns a user organizations list resource for testing.
 */
function userOrganizationsResource(): array
{
    return [
        'organizations' => [
            userOrganizationResource(),
            userOrganizationResource(),
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
        'account_id' => '9d0e0c69-f8b2-4c1a-9d0e-0c69f8b24xxx',
        'auth_method' => 'api_key_user',
        'auth_data' => '1234567890abcdef',
    ];
}
