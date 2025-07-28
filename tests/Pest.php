<?php

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

use Neon\Client;
use Neon\Contracts\TransporterContract;
use Neon\ValueObjects\ApiKey;
use Neon\ValueObjects\Transporter\BaseUri;
use Neon\ValueObjects\Transporter\Headers;
use Neon\ValueObjects\Transporter\Payload;
use Neon\ValueObjects\Transporter\QueryParams;

function mockClient(string $method, string $resource, array $params, array $response, $methodName = 'request', bool $validateParams = true)
{
    $transporter = Mockery::mock(TransporterContract::class);

    $transporter
        ->shouldReceive($methodName)
        ->once()
        ->withArgs(function (Payload $payload) use ($validateParams, $method, $resource, $params) {
            $baseUri = BaseUri::from('console.neon.tech/api/v2');
            $headers = Headers::withAuthorization(ApiKey::from('foo'));
            $queryParams = QueryParams::create();

            $request = $payload->toRequest($baseUri, $headers, $queryParams);

            if ($validateParams) {
                if (in_array($method, ['GET', 'DELETE'])) {
                    if ($request->getUri()->getQuery() !== http_build_query($params)) {
                        return false;
                    }
                } else {
                    if ($request->getBody()->getContents() !== json_encode($params)) {
                        return false;
                    }
                }
            }

            return $request->getMethod() === $method
            && $request->getUri()->getPath() === "/api/v2/$resource";
        })->andReturn($response);

    return new Client($transporter);
}
