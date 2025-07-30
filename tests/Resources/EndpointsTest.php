<?php

describe('Endpoints', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/endpoints',
            [],
            endpointListResource()
        );

        $result = $client->endpoints()->list('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->endpoints
            ->toHaveCount(2)
            ->and($result['endpoints'][0]['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['endpoints'][0]['type'])
            ->toBe('read_write')
            ->and($result['endpoints'][0]['current_state'])
            ->toBe('active')
            ->and($result['endpoints'][1]['id'])
            ->toBe('ep-endpoint-987654')
            ->and($result['endpoints'][1]['type'])
            ->toBe('read_only')
            ->and($result['endpoints'][1]['current_state'])
            ->toBe('idle');
    });

    test('create', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/endpoints',
            [
                'endpoint' => [
                    'branch_id' => 'br-branch-test-12345',
                    'type' => 'read_write',
                    'autoscaling_limit_min_cu' => 1,
                    'autoscaling_limit_max_cu' => 2,
                ],
            ],
            endpointOperationResource()
        );

        $result = $client->endpoints()->create('royal-hall-11111111', [
            'endpoint' => [
                'branch_id' => 'br-branch-test-12345',
                'type' => 'read_write',
                'autoscaling_limit_min_cu' => 1,
                'autoscaling_limit_max_cu' => 2,
            ],
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['endpoint']['type'])
            ->toBe('read_write')
            ->and($result['operations'])
            ->toHaveCount(1);
    });

    test('retrieve', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456',
            [],
            ['endpoint' => endpointResource()]
        );

        $result = $client->endpoints()->retrieve('royal-hall-11111111', 'ep-endpoint-123456');

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['endpoint']['project_id'])
            ->toBe('royal-hall-11111111')
            ->and($result['endpoint']['branch_id'])
            ->toBe('br-branch-test-12345')
            ->and($result['endpoint']['type'])
            ->toBe('read_write')
            ->and($result['endpoint']['current_state'])
            ->toBe('active')
            ->and($result['endpoint']['host'])
            ->toBe('ep-endpoint-123456.ap-southeast-2.aws.neon.tech');
    });

    test('update', function () {
        $client = mockClient(
            'PATCH',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456',
            [
                'endpoint' => [
                    'autoscaling_limit_max_cu' => 4,
                    'suspend_timeout_seconds' => 600,
                ],
            ],
            endpointOperationResource()
        );

        $result = $client->endpoints()->update('royal-hall-11111111', 'ep-endpoint-123456', [
            'endpoint' => [
                'autoscaling_limit_max_cu' => 4,
                'suspend_timeout_seconds' => 600,
            ],
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['operations'])
            ->toHaveCount(1);
    });

    test('delete', function () {
        $client = mockClient(
            'DELETE',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456',
            [],
            endpointOperationResource()
        );

        $result = $client->endpoints()->delete('royal-hall-11111111', 'ep-endpoint-123456');

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['operations'])
            ->toHaveCount(1);
    });

    test('start', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456/start',
            [],
            endpointOperationResource()
        );

        $result = $client->endpoints()->start('royal-hall-11111111', 'ep-endpoint-123456');

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['operations'])
            ->toHaveCount(1)
            ->and($result['operations'][0]['action'])
            ->toBe('start_compute');
    });

    test('suspend', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456/suspend',
            [],
            [
                'endpoint' => endpointResource(),
                'operations' => [
                    [
                        'id' => 'op-operation-123456',
                        'project_id' => 'royal-hall-11111111',
                        'branch_id' => 'br-branch-test-12345',
                        'endpoint_id' => 'ep-endpoint-123456',
                        'action' => 'suspend_compute',
                        'status' => 'running',
                        'failures_count' => 0,
                        'created_at' => '2025-07-27T01:45:32.898729Z',
                        'updated_at' => '2025-07-27T01:45:32.898729Z',
                    ],
                ],
            ]
        );

        $result = $client->endpoints()->suspend('royal-hall-11111111', 'ep-endpoint-123456');

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['operations'])
            ->toHaveCount(1)
            ->and($result['operations'][0]['action'])
            ->toBe('suspend_compute');
    });

    test('restart', function () {
        $client = mockClient(
            'POST',
            'projects/royal-hall-11111111/endpoints/ep-endpoint-123456/restart',
            [],
            [
                'endpoint' => endpointResource(),
                'operations' => [
                    [
                        'id' => 'op-operation-123456',
                        'project_id' => 'royal-hall-11111111',
                        'branch_id' => 'br-branch-test-12345',
                        'endpoint_id' => 'ep-endpoint-123456',
                        'action' => 'suspend_compute',
                        'status' => 'finished',
                        'failures_count' => 0,
                        'created_at' => '2025-07-27T01:45:32.898729Z',
                        'updated_at' => '2025-07-27T01:45:32.898729Z',
                    ],
                    [
                        'id' => 'op-operation-789012',
                        'project_id' => 'royal-hall-11111111',
                        'branch_id' => 'br-branch-test-12345',
                        'endpoint_id' => 'ep-endpoint-123456',
                        'action' => 'start_compute',
                        'status' => 'running',
                        'failures_count' => 0,
                        'created_at' => '2025-07-27T01:45:33.898729Z',
                        'updated_at' => '2025-07-27T01:45:33.898729Z',
                    ],
                ],
            ]
        );

        $result = $client->endpoints()->restart('royal-hall-11111111', 'ep-endpoint-123456');

        expect($result)
            ->toBeArray()
            ->and($result['endpoint']['id'])
            ->toBe('ep-endpoint-123456')
            ->and($result['operations'])
            ->toHaveCount(2)
            ->and($result['operations'][0]['action'])
            ->toBe('suspend_compute')
            ->and($result['operations'][1]['action'])
            ->toBe('start_compute');
    });
});
