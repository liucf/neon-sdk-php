<?php

declare(strict_types=1);

namespace Neon\ValueObjects\Transporter;

use GuzzleHttp\Psr7\Request;
use Neon;
use Neon\Enums\Transporter\ContentType;
use Neon\Enums\Transporter\Method;
use Neon\ValueObjects\ResourceUri;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
final class Payload
{
    /**
     * Creates a new Request value object.
     *
     * @param  array<string, mixed>  $parameters
     */
    private function __construct(
        private readonly ContentType $contentType,
        private readonly Method $method,
        private readonly ResourceUri $uri,
        private readonly array $parameters = [],
        private readonly ?string $idempotencyKey = null
    ) {
        // ..
    }

    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<string, mixed>  $parameters
     */
    public static function list(string $resource, array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::list($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<string, mixed>  $parameters
     */
    public static function retrieve(string $resource, string $id, string $suffix = '', array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::retrieve($resource, $id, $suffix);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<string, mixed>  $parameters
     */
    public static function modify(string $resource, string $id, array $parameters = []): self
    {
        $contentType = ContentType::JSON;
        $method = Method::PATCH;
        $uri = ResourceUri::modify($resource, $id);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     */
    public static function retrieveContent(string $resource, string $id): self
    {
        $contentType = ContentType::JSON;
        $method = Method::GET;
        $uri = ResourceUri::retrieveContent($resource, $id);

        return new self($contentType, $method, $uri);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<string, mixed>  $parameters
     */
    public static function create(string $resource, array $parameters): self
    {
        $contentType = ContentType::JSON;
        $method = Method::POST;
        $uri = ResourceUri::create($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     *
     * @param  array<string, mixed>  $parameters
     */
    public static function upload(string $resource, array $parameters): self
    {
        $contentType = ContentType::MULTIPART;
        $method = Method::POST;
        $uri = ResourceUri::upload($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     */
    public static function cancel(string $resource, string $id): self
    {
        $contentType = ContentType::JSON;
        $method = Method::POST;
        $uri = ResourceUri::cancel($resource, $id);

        return new self($contentType, $method, $uri);
    }

    /**
     * Creates a new Payload value object from the given parameters.
     */
    public static function delete(string $resource, string $id): self
    {
        $contentType = ContentType::JSON;
        $method = Method::DELETE;
        $uri = ResourceUri::delete($resource, $id);

        return new self($contentType, $method, $uri);
    }

    /**
     * Creates a new Psr 7 Request instance.
     */
    public function toRequest(BaseUri $baseUri, Headers $headers, QueryParams $queryParams): RequestInterface
    {
        $body = null;

        $uri = $baseUri->toString().$this->uri->toString();

        $queryParams = $queryParams->toArray();
        if ($this->method === Method::GET) {
            $queryParams = [...$queryParams, ...$this->parameters];
        }

        if ($queryParams !== []) {
            $uri .= '?'.http_build_query($queryParams);
        }

        $headers = $headers->withUserAgent('neon-php', Neon::VERSION)->withContentType($this->contentType);

        if ($this->idempotencyKey) {
            $headers = $headers->withIdempotencyKey($this->idempotencyKey);
        }

        if ($this->method === Method::POST || $this->method === Method::PATCH || $this->method === Method::PUT) {
            $body = json_encode($this->parameters, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
        }

        return new Request($this->method->value, $uri, $headers->toArray(), $body);
    }
}
