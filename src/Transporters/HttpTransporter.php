<?php

declare(strict_types=1);

namespace Neon\Transporters;

use Closure;
use GuzzleHttp\Exception\ClientException;
use JsonException;
use Neon\Contracts\TransporterContract;
use Neon\Enums\Transporter\ContentType;
use Neon\Exceptions\ErrorException;
use Neon\Exceptions\TransporterException;
use Neon\Exceptions\UnserializableResponse;
use Neon\ValueObjects\Transporter\BaseUri;
use Neon\ValueObjects\Transporter\Headers;
use Neon\ValueObjects\Transporter\Payload;
use Neon\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Neon\ValueObjects\Transporter\Response;

/**
 * @internal
 */
final class HttpTransporter implements TransporterContract
{
    /**
     * Creates a new Http Transporter instance.
     */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly BaseUri $baseUri,
        private readonly Headers $headers,
        private readonly QueryParams $queryParams,
    ) {
        // ..
    }

    /**
     * {@inheritDoc}
     */
    public function request(Payload $payload): array
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest(fn(): \Psr\Http\Message\ResponseInterface => $this->client->sendRequest($request));

        $contents = (string) $response->getBody();

        $this->throwIfJsonError($response, $contents);

        try {
            return json_decode($contents, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }
    }

    private function sendRequest(Closure $callable): ResponseInterface
    {
        try {
            return $callable();
        } catch (ClientExceptionInterface $clientException) {
            if ($clientException instanceof ClientException) {
                $this->throwIfJsonError($clientException->getResponse(), (string) $clientException->getResponse()->getBody());
            }

            throw new TransporterException($clientException);
        }
    }

    private function throwIfJsonError(ResponseInterface $response, string|ResponseInterface $contents): void
    {
        if ($response->getStatusCode() < 400) {
            return;
        }

        if (! str_contains($response->getHeaderLine('Content-Type'), ContentType::JSON->value)) {
            return;
        }

        $statusCode = $response->getStatusCode();

        if ($contents instanceof ResponseInterface) {
            $contents = (string) $contents->getBody();
        }

        try {
            /** @var array{error?: array{message: string|array<int, string>, type: string, code: string}} $response */
            $response = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);

            if ($statusCode !== 200) {
                throw new ErrorException($response, $statusCode);
            }
        } catch (JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }
    }
}
