<?php

use Neon\ValueObjects\Transporter\Response;
use Neon\Responses\ApiKeys\ListResponse;
use Neon\Responses\ApiKeys\RetrieveResponse;


describe('ApiKeys', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'api-keys',
            [],
            Response::from(apiKeyListResource())
        );

        $result = $client->ApiKeys()->list();
        expect($result)
            ->toBeInstanceOf(ListResponse::class)
            ->data->toBeArray()->toHaveCount(2)
            ->data->each->toBeInstanceOf(RetrieveResponse::class);
    });
});
