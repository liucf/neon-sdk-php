<?php

describe('Projects', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'projects',
            [
                'project' => [
                    'org_id' => 'org_123456789',
                ],
            ],
            projectListResource()
        );

        $result = $client->projects()->list(
            [
                'project' => [
                    'org_id' => 'org_123456789',
                ],
            ]
        );

        expect($result)
            ->toBeArray()
            ->projects
            ->toHaveCount(2)
            ->and($result['projects'][0]['id'])
            ->toBe('royal-hall-11111111')
            ->and($result['projects'][0]['platform_id'])
            ->toBe('aws')
            ->and($result['pagination']['cursor'])
            ->toBe('2025-07-27T01:45:32.898729Z')
            ->and($result['application'])
            ->toBeEmpty()
            ->and($result['integrations'])
            ->toBeEmpty();
    });

    test('list with parameters', function () {
        $client = mockClient(
            'GET',
            'projects',
            [
                'project' => [
                    'org_id' => 'org_123456789',
                    'limit' => 2,
                    'cursor' => '2025-07-27T01:45:32.898729Z',
                ],
            ],
            projectListResource()
        );

        $result = $client->projects()->list([
            'project' => [
                'org_id' => 'org_123456789',
                'limit' => 2,
                'cursor' => '2025-07-27T01:45:32.898729Z',
            ],
        ]);

        expect($result)
            ->toBeArray()
            ->projects
            ->toHaveCount(2);
    });

    test('create', function () {
        $client = mockClient(
            'POST',
            'projects',
            [
                'project' => [
                    'name' => 'test_project',
                ],
            ],
            projectResource()
        );

        $result = $client->projects()->create([
            'project' => [
                'name' => 'test_project',
            ],
        ]);

        expect($result)->toBeArray();
    });

    test('list shared', function () {
        $client = mockClient(
            'GET',
            'projects/shared',
            [
                'cursor' => '2025-07-27T01:45:32.898729Z',
                'limit' => 2,
            ],
            []
        );

        $result = $client->projects()->listShared(
            [
                'cursor' => '2025-07-27T01:45:32.898729Z',
                'limit' => 2,
            ]
        );

        expect($result)->toBeArray();
    });

    test('retrieve', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111',
            [],
            projectResource()
        );

        $result = $client->projects()->retrieve('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('royal-hall-11111111')
            ->and($result['platform_id'])
            ->toBe('aws')
            ->and($result['region_id'])
            ->toBe('aws-ap-southeast-2')
            ->and($result['name'])
            ->toBe('test_projects')
            ->and($result['provisioner'])
            ->toBe('k8s-neonvm');
    });

    test('update', function () {
        $client = mockClient(
            'PATCH',
            'projects/royal-hall-11111111',
            ['project' => ['name' => 'updated_project_name']],
            projectResource()
        );

        $result = $client->projects()->update('royal-hall-11111111', ['project' => ['name' => 'updated_project_name']]);

        expect($result)->toBeArray();
    });

    test('delete', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111',
            [],
            ['project' => projectResource()]
        );

        $result = $client->projects()->delete('royal-hall-11111111');

        expect($result)->toBeArray();
    });

    test('list permissions', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/permissions',
            [],
            [
                'permissions' => [
                    [
                        'id' => 'perm_123456789',
                        'granted_to_email' => 'user@example.com',
                        'granted_at' => '2025-07-27T01:45:32.898729Z',
                    ],
                ],
            ]
        );

        $result = $client->projects()->listPermissions('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->permissions
            ->toHaveCount(1)
            ->and($result['permissions'][0]['id'])
            ->toBe('perm_123456789')
            ->and($result['permissions'][0]['granted_to_email'])
            ->toBe('user@example.com');
    });

    test('grant permission', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/permissions',
            ['email' => 'user@example.com'],
            [
                'id' => 'perm_123456789',
                'granted_to_email' => 'user@example.com',
                'granted_at' => '2025-07-27T01:45:32.898729Z',
            ]
        );

        $result = $client->projects()->grantPermission('royal-hall-11111111', ['email' => 'user@example.com']);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('perm_123456789')
            ->and($result['granted_to_email'])
            ->toBe('user@example.com');
    });

    test('revoke permission', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111/permissions/perm_123456789',
            [],
            ['revoked' => true]
        );

        $result = $client->projects()->revokePermission('royal-hall-11111111', 'perm_123456789');

        expect($result)->toBeArray();
    });

    test('get available preload libraries', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/available_preload_libraries',
            [],
            [
                'libraries' => [
                    'pg_stat_statements',
                    'pg_hstore',
                    'uuid-ossp',
                ],
            ]
        );

        $result = $client->projects()->getAvailablePreloadLibraries('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->libraries
            ->toHaveCount(3)
            ->and($result['libraries'][0])
            ->toBe('pg_stat_statements');
    });

    test('create transfer request', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/transfer_requests',
            ['target_email' => 'target@example.com'],
            [
                'id' => 'tr_123456789',
                'target_email' => 'target@example.com',
                'created_at' => '2025-07-27T01:45:32.898729Z',
                'expires_at' => '2025-08-03T01:45:32.898729Z',
            ]
        );

        $result = $client->projects()->createTransferRequest('royal-hall-11111111', ['target_email' => 'target@example.com']);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('tr_123456789')
            ->and($result['target_email'])
            ->toBe('target@example.com');
    });

    test('accept transfer request', function () {
        $client = mockClient(
            'PATCH',
            'projects/royal-hall-11111111/transfer_requests/tr_123456789',
            ['org_id' => 'org_987654321'],
            [
                'id' => 'tr_123456789',
                'status' => 'accepted',
                'accepted_at' => '2025-07-27T01:45:32.898729Z',
            ]
        );

        $result = $client->projects()->acceptTransferRequest('royal-hall-11111111', 'tr_123456789', ['org_id' => 'org_987654321']);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('tr_123456789')
            ->and($result['status'])
            ->toBe('accepted');
    });

    test('list jwks', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/jwks',
            [],
            [
                'jwks' => [
                    [
                        'id' => 'jwks_123456789',
                        'jwks_url' => 'https://example.com/.well-known/jwks.json',
                        'provider_name' => 'Auth0',
                        'created_at' => '2025-07-27T01:45:32.898729Z',
                    ],
                ],
            ]
        );

        $result = $client->projects()->listJwks('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->jwks
            ->toHaveCount(1)
            ->and($result['jwks'][0]['id'])
            ->toBe('jwks_123456789')
            ->and($result['jwks'][0]['provider_name'])
            ->toBe('Auth0');
    });

    test('add jwks', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/jwks',
            [
                'jwks_url' => 'https://example.com/.well-known/jwks.json',
                'provider_name' => 'Auth0',
            ],
            [
                'id' => 'jwks_123456789',
                'jwks_url' => 'https://example.com/.well-known/jwks.json',
                'provider_name' => 'Auth0',
                'created_at' => '2025-07-27T01:45:32.898729Z',
            ]
        );

        $result = $client->projects()->addJwks('royal-hall-11111111', [
            'jwks_url' => 'https://example.com/.well-known/jwks.json',
            'provider_name' => 'Auth0',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('jwks_123456789')
            ->and($result['jwks_url'])
            ->toBe('https://example.com/.well-known/jwks.json');
    });

    test('delete jwks', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111/jwks/jwks_123456789',
            [],
            ['deleted' => true]
        );

        $result = $client->projects()->deleteJwks('royal-hall-11111111', 'jwks_123456789');

        expect($result)->toBeArray();
    });

    test('get connection uri', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/connection_uri',
            [
                'database_name' => 'main',
                'role_name' => 'user',
            ],
            [
                'uri' => 'postgresql://user:password@ep-example.us-east-1.aws.neon.tech/main',
            ]
        );

        $result = $client->projects()->getConnectionUri('royal-hall-11111111', [
            'database_name' => 'main',
            'role_name' => 'user',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['uri'])
            ->toContain('postgresql://');
    });

    test('list vpc endpoints', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/vpc_endpoints',
            [],
            [
                'vpc_endpoints' => [
                    [
                        'id' => 'vpc_123456789',
                        'vpc_id' => 'vpc-0123456789abcdef0',
                        'region' => 'us-east-1',
                        'created_at' => '2025-07-27T01:45:32.898729Z',
                    ],
                ],
            ]
        );

        $result = $client->projects()->listVpcEndpoints('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->vpc_endpoints
            ->toHaveCount(1)
            ->and($result['vpc_endpoints'][0]['id'])
            ->toBe('vpc_123456789');
    });

    test('set vpc endpoint', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/vpc_endpoints/vpc_123456789',
            [],
            [
                'id' => 'vpc_123456789',
                'vpc_id' => 'vpc-0123456789abcdef0',
                'region' => 'us-east-1',
                'assigned_at' => '2025-07-27T01:45:32.898729Z',
            ]
        );

        $result = $client->projects()->setVpcEndpoint('royal-hall-11111111', 'vpc_123456789');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe('vpc_123456789')
            ->and($result['vpc_id'])
            ->toBe('vpc-0123456789abcdef0');
    });

    test('delete vpc endpoint', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111/vpc_endpoints/vpc_123456789',
            [],
            ['deleted' => true]
        );

        $result = $client->projects()->deleteVpcEndpoint('royal-hall-11111111', 'vpc_123456789');

        expect($result)->toBeArray();
    });
});
