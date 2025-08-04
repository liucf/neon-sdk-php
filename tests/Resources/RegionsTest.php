<?php

use Neon\Responses\Regions\ListResponse;
use Neon\Responses\Regions\RetrieveResponse;
use Neon\ValueObjects\Transporter\Response;

describe('Regions', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'regions',
            [],
            Response::from(regionListResource())
        );

        $result = $client->regions()->list();

        expect($result)
            ->toBeInstanceOf(ListResponse::class)
            ->data->toBeArray()->toHaveCount(2)
            ->data->each->toBeInstanceOf(RetrieveResponse::class);
    });
});
