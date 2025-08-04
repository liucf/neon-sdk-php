<?php

use Neon\Responses\ApiKeys\CreateResponse;
use Neon\Responses\ApiKeys\ListResponse;
use Neon\Responses\ApiKeys\RetrieveResponse;
use Neon\Responses\ApiKeys\RevokeResponse;
use Neon\ValueObjects\Transporter\Response;

describe('ApiKeys', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'api_keys',
            [],
            Response::from(apiKeyListResource())
        );

        $result = $client->apiKeys()->list();

        expect($result)
            ->toBeInstanceOf(ListResponse::class)
            ->data->toBeArray()->toHaveCount(2)
            ->data->each->toBeInstanceOf(RetrieveResponse::class);
    });

    test('create', function () {
        $client = mockClient(
            'POST',
            'api_keys',
            [
                'name' => 'Test API Key',
            ],
            Response::from(apiKeyCreateResource())
        );

        $result = $client->apiKeys()->create([
            'name' => 'Test API Key',
        ]);
        expect($result)
            ->toBeInstanceOf(CreateResponse::class)
            ->id
            ->toBe(123456)
            ->key
            ->toBe('sk_test_1234567890abcdef');
    });

    test('revoke', function () {
        $client = mockClient(
            'DELETE',
            'api_keys/123456',
            [],
            Response::from(apiKeyRevokeResource())
        );

        $result = $client->apiKeys()->revoke('123456');

        expect($result)
            ->toBeInstanceOf(RevokeResponse::class)
            ->id->toBe(123456)
            ->revoked->toBeTrue();
    });
});
