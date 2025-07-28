<?php

use Neon\Responses\ApiKeys\ListResponse;
use Neon\Responses\ApiKeys\RetrieveResponse;

test('from', function () {
    $response = ListResponse::from(apiKeyListResource());
    expect($response)
        ->toBeInstanceOf(ListResponse::class)
        ->offsetGet('object')->toBe('list')
        ->data->toBeArray()->toHaveCount(2)
        ->data->each->toBeInstanceOf(RetrieveResponse::class);
});


test('as array accessible', function () {
    $response = ListResponse::from(apiKeyListResource());

    expect($response['object'])->toBe('list');
});

test('to array', function () {
    $response = ListResponse::from(apiKeyListResource());

    expect($response->toArray())
        ->toBeArray()
        ->toBe(apiKeyListResource());
});

test('fake', function () {
    $response = ListResponse::fake();
    expect($response['data'][0])->id->toBe(1111111);
});

test('fake with override', function () {
    $response = ListResponse::fake([
        'data' => [
            [
                'id' => 2222222,
            ],
        ],
    ]);

    expect($response['data'][0])->id->toBe(2222222);
});
