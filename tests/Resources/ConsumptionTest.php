<?php

describe('Consumption', function () {
    test('account', function () {
        $client = mockClient(
            'GET',
            'consumption_history/account',
            [],
            consumptionAccountResource()
        );

        $result = $client->consumption()->account();

        expect($result)
            ->toBeArray()
            ->periods
            ->toHaveCount(1)
            ->and($result['periods'][0]['period_id'])
            ->toBe('period-123456')
            ->and($result['periods'][0]['consumption']['active_time_seconds'])
            ->toBe(3600)
            ->and($result['periods'][0]['consumption']['compute_time_seconds'])
            ->toBe(1800)
            ->and($result['periods'][0]['consumption']['written_data_bytes'])
            ->toBe(1073741824)
            ->and($result['periods'][0]['projects'])
            ->toHaveCount(1)
            ->and($result['periods'][0]['projects'][0]['project_id'])
            ->toBe('royal-hall-11111111')
            ->and($result['periods'][0]['projects'][0]['project_name'])
            ->toBe('my-project');
    });

    test('account with parameters', function () {
        $client = mockClient(
            'GET',
            'consumption_history/account',
            [
                'from' => '2025-07-01T00:00:00Z',
                'to' => '2025-07-31T23:59:59Z',
                'granularity' => 'monthly',
            ],
            consumptionAccountResource()
        );

        $result = $client->consumption()->account([
            'from' => '2025-07-01T00:00:00Z',
            'to' => '2025-07-31T23:59:59Z',
            'granularity' => 'monthly',
        ]);

        expect($result)
            ->toBeArray()
            ->periods
            ->toHaveCount(1)
            ->and($result['periods'][0]['period_start'])
            ->toBe('2025-07-01T00:00:00Z')
            ->and($result['periods'][0]['period_end'])
            ->toBe('2025-07-31T23:59:59Z');
    });

    test('projects', function () {
        $client = mockClient(
            'GET',
            'consumption_history/projects',
            [],
            consumptionProjectsResource()
        );

        $result = $client->consumption()->projects();

        expect($result)
            ->toBeArray()
            ->projects
            ->toHaveCount(2)
            ->and($result['projects'][0]['project_id'])
            ->toBe('royal-hall-11111111')
            ->and($result['projects'][0]['project_name'])
            ->toBe('my-project-1')
            ->and($result['projects'][0]['periods'])
            ->toHaveCount(1)
            ->and($result['projects'][0]['periods'][0]['consumption']['active_time_seconds'])
            ->toBe(1800)
            ->and($result['projects'][1]['project_id'])
            ->toBe('golden-sunset-22222222')
            ->and($result['projects'][1]['project_name'])
            ->toBe('my-project-2');
    });

    test('projects with parameters', function () {
        $client = mockClient(
            'GET',
            'consumption_history/projects',
            [
                'from' => '2025-07-01T00:00:00Z',
                'to' => '2025-07-31T23:59:59Z',
                'granularity' => 'daily',
                'org_id' => 'org-123456',
            ],
            consumptionProjectsResource()
        );

        $result = $client->consumption()->projects([
            'from' => '2025-07-01T00:00:00Z',
            'to' => '2025-07-31T23:59:59Z',
            'granularity' => 'daily',
            'org_id' => 'org-123456',
        ]);

        expect($result)
            ->toBeArray()
            ->projects
            ->toHaveCount(2);
    });
});
