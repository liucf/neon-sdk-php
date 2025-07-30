<?php

describe('Branches', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches',
            [],
            branchListResource()
        );

        $result = $client->branches()->list('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->branches
            ->toHaveCount(2)
            ->and($result['branches'][0]['id'])
            ->toBe('br-branch-test-12345')
            ->and($result['branches'][0]['name'])
            ->toBe('test-branch')
            ->and($result['branches'][1]['id'])
            ->toBe('br-main-12345')
            ->and($result['branches'][1]['name'])
            ->toBe('main')
            ->and($result['branches'][1]['primary'])
            ->toBe(true)
            ->and($result['pagination']['cursor'])
            ->toBe('2025-07-27T01:45:32.898729Z');
    });

    test('list with parameters', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches',
            [
                'search' => 'test',
                'sort_by' => 'name',
                'sort_order' => 'asc',
                'limit' => 10,
            ],
            branchListResource()
        );

        $result = $client->branches()->list('royal-hall-11111111', [
            'search' => 'test',
            'sort_by' => 'name',
            'sort_order' => 'asc',
            'limit' => 10,
        ]);

        expect($result)
            ->toBeArray()
            ->branches
            ->toHaveCount(2);
    });

    test('create', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/branches',
            [
                'branch' => [
                    'name' => 'test-branch',
                    'parent_id' => 'br-main-12345',
                ],
            ],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->create('royal-hall-11111111', [
            'branch' => [
                'name' => 'test-branch',
                'parent_id' => 'br-main-12345',
            ],
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['branch']['id'])
            ->toBe('br-branch-test-12345')
            ->and($result['branch']['name'])
            ->toBe('test-branch');
    });

    test('create without parameters', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/branches',
            [],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->create('royal-hall-11111111');

        expect($result)->toBeArray();
    });

    test('count', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/count',
            [],
            branchCountResource()
        );

        $result = $client->branches()->count('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->and($result['count'])
            ->toBe(2);
    });

    test('retrieve', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345',
            [],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->retrieve('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)
            ->toBeArray()
            ->and($result['branch']['id'])
            ->toBe('br-branch-test-12345')
            ->and($result['branch']['name'])
            ->toBe('test-branch')
            ->and($result['branch']['project_id'])
            ->toBe('royal-hall-11111111')
            ->and($result['branch']['parent_id'])
            ->toBe('br-main-12345')
            ->and($result['branch']['current_state'])
            ->toBe('ready');
    });

    test('update', function () {
        $client = mockClient(
            'PATCH',
            'projects/royal-hall-11111111/branches/br-branch-test-12345',
            [
                'branch' => [
                    'name' => 'updated-branch-name',
                ],
            ],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->update('royal-hall-11111111', 'br-branch-test-12345', [
            'branch' => [
                'name' => 'updated-branch-name',
            ],
        ]);

        expect($result)->toBeArray();
    });

    test('delete', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111/branches/br-branch-test-12345',
            [],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->delete('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)->toBeArray();
    });

    test('restore', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/restore',
            [
                'source_branch_id' => 'br-main-12345',
                'timestamp' => '2025-07-26T12:00:00Z',
            ],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->restore('royal-hall-11111111', 'br-branch-test-12345', [
            'source_branch_id' => 'br-main-12345',
            'timestamp' => '2025-07-26T12:00:00Z',
        ]);

        expect($result)->toBeArray();
    });

    test('set as default', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/set_as_default',
            [],
            ['branch' => branchResource()]
        );

        $result = $client->branches()->setAsDefault('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)->toBeArray();
    });

    test('get schema', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/schema',
            [
                'db_name' => 'main',
                'format' => 'sql',
            ],
            branchSchemaResource()
        );

        $result = $client->branches()->getSchema('royal-hall-11111111', 'br-branch-test-12345', [
            'db_name' => 'main',
            'format' => 'sql',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['sql'])
            ->toContain('CREATE TABLE');
    });

    test('get schema with timestamp', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/schema',
            [
                'db_name' => 'main',
                'timestamp' => '2025-07-26T12:00:00Z',
                'format' => 'json',
            ],
            branchSchemaResource()
        );

        $result = $client->branches()->getSchema('royal-hall-11111111', 'br-branch-test-12345', [
            'db_name' => 'main',
            'timestamp' => '2025-07-26T12:00:00Z',
            'format' => 'json',
        ]);

        expect($result)->toBeArray();
    });

    test('compare schema', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/schema/compare',
            [
                'target_branch_id' => 'br-main-12345',
                'db_name' => 'main',
            ],
            ['diff' => 'No differences found']
        );

        $result = $client->branches()->compareSchema('royal-hall-11111111', 'br-branch-test-12345', [
            'target_branch_id' => 'br-main-12345',
            'db_name' => 'main',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['diff'])
            ->toBe('No differences found');
    });

    test('list endpoints', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/endpoints',
            [],
            branchEndpointsResource()
        );

        $result = $client->branches()->listEndpoints('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)
            ->toBeArray()
            ->endpoints
            ->toHaveCount(1)
            ->and($result['endpoints'][0]['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['endpoints'][0]['type'])
            ->toBe('read_write')
            ->and($result['endpoints'][0]['branch_id'])
            ->toBe('br-branch-test-12345');
    });

    test('list databases', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/databases',
            [],
            branchDatabasesResource()
        );

        $result = $client->branches()->listDatabases('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)
            ->toBeArray()
            ->databases
            ->toHaveCount(2)
            ->and($result['databases'][0]['name'])
            ->toBe('main')
            ->and($result['databases'][0]['branch_id'])
            ->toBe('br-branch-test-12345')
            ->and($result['databases'][1]['name'])
            ->toBe('testdb');
    });

    test('list roles', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/branches/br-branch-test-12345/roles',
            [],
            branchRolesResource()
        );

        $result = $client->branches()->listRoles('royal-hall-11111111', 'br-branch-test-12345');

        expect($result)
            ->toBeArray()
            ->roles
            ->toHaveCount(2)
            ->and($result['roles'][0]['name'])
            ->toBe('test_user')
            ->and($result['roles'][0]['branch_id'])
            ->toBe('br-branch-test-12345')
            ->and($result['roles'][1]['name'])
            ->toBe('web_access');
    });
});
