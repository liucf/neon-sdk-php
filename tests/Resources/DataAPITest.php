<?php

describe('DataAPI', function () {
    test('create', function () {
        $client = mockClient(
            'POST',
            'projects/spring-example-302709/branches/br-wispy-meadow-118737/data-api',
            [
                'database_name' => 'neondb',
                'jwks_url' => 'https://auth.example.com/.well-known/jwks.json',
                'jwt_audience' => 'neon-data-api',
            ],
            dataApiCreateResource()
        );

        $result = $client->dataAPI()->create('spring-example-302709', 'br-wispy-meadow-118737', [
            'database_name' => 'neondb',
            'jwks_url' => 'https://auth.example.com/.well-known/jwks.json',
            'jwt_audience' => 'neon-data-api',
        ]);

        expect($result)->toBe(dataApiCreateResource());
    });

    test('get', function () {
        $client = mockClient(
            'GET',
            'projects/spring-example-302709/branches/br-wispy-meadow-118737/data-api',
            [],
            dataApiGetResource()
        );

        $result = $client->dataAPI()->get('spring-example-302709', 'br-wispy-meadow-118737');

        expect($result)->toBe(dataApiGetResource());
    });

    test('delete', function () {
        $client = mockClient(
            'DELETE',
            'projects/spring-example-302709/branches/br-wispy-meadow-118737/data-api',
            [],
            []
        );

        $result = $client->dataAPI()->delete('spring-example-302709', 'br-wispy-meadow-118737');

        expect($result)->toBe([]);
    });
});
