<?php

describe('ApiKeys', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'api_keys',
            [],
            apiKeyListResource()
        );

        $result = $client->apiKeys()->list();

        expect($result)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($result[0]['id'])
            ->toBe(123456)
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

        $result = $client->apiKeys()->create([
            'name' => 'Test API Key',
        ]);

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(123456)
            ->and($result['created_by']['name'])
            ->toBe('John Doe');
    });

    test('revoke', function () {
        $client = mockClient(
            'DELETE',
            'api_keys/123456',
            [],
            apiKeyRevokeResource()
        );

        $result = $client->apiKeys()->revoke('123456');

        expect($result)
            ->toBeArray()
            ->and($result['id'])
            ->toBe(123456)
            ->and($result['revoked'])
            ->toBeTrue();
    });
});
