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

    // test('retrieve', function () {
    //     $client = mockClient(
    //         'GET',
    //         'projects/royal-hall-11111111/operations/33d65f33-eabe-4f46-b945-aa2bb7772xxx',
    //         [],
    //         operationResource()
    //     );

    //     $result = $client->operations()->retrieve('royal-hall-11111111', '33d65f33-eabe-4f46-b945-aa2bb7772xxx');

    //     expect($result)
    //         ->toBeArray()
    //         ->and($result['id'])
    //         ->toBe('33d65f33-eabe-4f46-b945-aa2bb7772xxx')
    //         ->and($result['project_id'])
    //         ->toBe('royal-hall-11111111')
    //         ->and($result['action'])
    //         ->toBe('check_availability')
    //         ->and($result['status'])
    //         ->toBe('finished')
    //         ->and($result['failures_count'])
    //         ->toBe(0);
    // });
});
