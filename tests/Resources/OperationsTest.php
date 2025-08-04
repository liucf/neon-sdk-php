<?php

use Neon\Responses\Operations\ListResponse;
use Neon\Responses\Operations\RetrieveResponse;
use Neon\ValueObjects\Transporter\Response;

describe('Operations', function () {
    test('list', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/operations',
            [],
            Response::from(operationListResource())
        );

        $result = $client->operations()->list('royal-hall-11111111');

        expect($result)
            ->toBeInstanceOf(ListResponse::class)
            ->data->toBeArray()->toHaveCount(2)
            ->data->each->toBeInstanceOf(RetrieveResponse::class);
    });

    test('list with parameters', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/operations',
            [
                'limit' => 2,
                'cursor' => '2025-07-27T01:45:32.898729Z',
            ],
            Response::from(operationListResource())
        );

        $result = $client->operations()->list('royal-hall-11111111', [
            'limit' => 2,
            'cursor' => '2025-07-27T01:45:32.898729Z',
        ]);

        expect($result)
            ->toBeInstanceOf(ListResponse::class)
            ->data->toBeArray()->toHaveCount(2);
    });

    test('retrieve', function () {
        $client = mockClient(
            'GET',
            'projects/royal-hall-11111111/operations/33d65f33-eabe-4f46-b945-aa2bb7772xxx',
            [],
            Response::from(operationResource())
        );

        $result = $client->operations()->retrieve('royal-hall-11111111', '33d65f33-eabe-4f46-b945-aa2bb7772xxx');

        expect($result)
            ->toBeInstanceOf(RetrieveResponse::class)
            ->id->toBe('33d65f33-eabe-4f46-b945-aa2bb7772xxx')
            ->projectId->toBe('royal-hall-11111111')
            ->action->toBe('check_availability')
            ->status->toBe('finished')
            ->failuresCount->toBe(0);
    });
});
