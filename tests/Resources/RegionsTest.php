<?php

describe('Regions', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'regions',
            [],
            regionListResource()
        );

        $result = $client->regions()->list();

        expect($result)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($result[0]['region_id'])
            ->toBe('aws-us-east-2')
            ->and($result[0]['name'])
            ->toBe('AWS US East 2 (Ohio)');
    });
});
