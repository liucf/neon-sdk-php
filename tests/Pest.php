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
use Neon\ValueObjects\Transporter\Response;
use Psr\Http\Message\ResponseInterface;

// function mockClient(string $method, string $resource, array $parameters, array $rawHeaders, Response|ResponseInterface|string $response, $methodName = 'request')
// {
//     $transporter = Mockery::mock(TransporterContract::class);

//     $transporter
//         ->shouldReceive($methodName)
//         ->once()
//         ->withArgs(function (Payload $payload) use ($method, $resource, $parameters, $rawHeaders) {
//             $baseUri = BaseUri::from('api.resend.com');
//             $headers = Headers::withAuthorization(ApiKey::from('foo'));

//             $request = $payload->toRequest($baseUri, $headers);

//             if ($method === 'POST' || $method === 'PATCH' || $method === 'PUT') {
//                 $expectedBody = ($parameters === [] || ! array_is_list($parameters))
//                     ? json_encode((object) $parameters, JSON_THROW_ON_ERROR)
//                     : json_encode($parameters, JSON_THROW_ON_ERROR);

//                 if ((string) $request->getBody() !== $expectedBody) {
//                     return false;
//                 }
//             }

//             if (array_key_exists('Idempotency-Key', $rawHeaders)) {
//                 if (! $request->hasHeader('Idempotency-Key')) {
//                     return false;
//                 }

//                 if ($request->getHeader('Idempotency-Key')[0] !== $rawHeaders['Idempotency-Key']) {
//                     return false;
//                 }
//             }

//             return $request->getMethod() === $method
//                 && $request->getHeader('User-Agent')[0] === 'resend-php/' . Neon::VERSION
//                 && $request->getUri()->getPath() === "/{$resource}";
//         })->andReturn($response);

//     return new Client($transporter);
// }

function mockClient(string $method, string $resource, array $params, Response|ResponseInterface|string $response, $methodName = 'request', bool $validateParams = true)
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

            return $request->getMethod() === $method;
            // && $request->getUri()->getPath() === "/v1/$resource";
        })->andReturn($response);

    return new Client($transporter);
}
