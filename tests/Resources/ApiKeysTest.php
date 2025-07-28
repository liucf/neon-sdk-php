<?php

describe('ApiKeys', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'api_keys',
            [],
            apiKeyListResource()
        );

        $result = $client->ApiKeys()->list();

        expect($result)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($result[0]['id'])
            ->toBe(2180775)
            ->and($result[0]['created_by']['name'])
            ->toBe('John Doe');
    });

    test('create', function () {
        $client = mockClient(
            'POST',
            'api_keys',
            [
                'name' => 'Test API Key',
            ],
            apiKeyResource()
        );

        $result = $client->ApiKeys()->create([
            'name' => 'Test API Key',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(2180775)
            ->and($result['created_by']['name'])
            ->toBe('John Doe');
    });

    test('revoke', function () {
        $client = mockClient(
            'DELETE',
            'api_keys/2180775',
            [],
            apiKeyRevokeResource()
        );

        $result = $client->ApiKeys()->revoke('2180775');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(2180775)
            ->and($result['revoked'])
            ->toBeTrue();
    });
});
