<?php

describe('Operations', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/operations',
            [],
            operationListResource()
        );

        $result = $client->operations()->list('royal-hall-11111111');

        expect($result)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($result['operations'][0]['id'])
            ->toBe('33d65f33-eabe-4f46-b945-aa2bb7772xxx')
            ->and($result['operations'][0]['project_id'])
            ->toBe('royal-hall-11111111')
            ->and($result['operations'][0]['action'])
            ->toBe('check_availability')
            ->and($result['operations'][0]['status'])
            ->toBe('finished')
            ->and($result['operations'][0]['failures_count'])
            ->toBe(0);
    });

    test('list with parameters', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/operations',
            [
                'limit' => 2,
                'cursor' => '2025-07-27T01:45:32.898729Z',
            ],
            operationListResource()
        );

        $result = $client->operations()->list('royal-hall-11111111', [
            'limit' => 2,
            'cursor' => '2025-07-27T01:45:32.898729Z',
        ]);

        expect($result)
            ->toBeArray()
            ->toHaveCount(2);
    });
});
