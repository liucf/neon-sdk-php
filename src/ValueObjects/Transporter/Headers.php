<?php

declare(strict_types=1);

namespace Neon\ValueObjects\Transporter;

use Neon\Enums\Transporter\ContentType;
use Neon\ValueObjects\ApiKey;

/**
 * @internal
 */
final class Headers
{
    /**
     * Creates a new Headers value object.
     *
     * @param  array<string, string>  $headers
     */
    private function __construct(private readonly array $headers)
    {
        // ..
    }

    /**
     * Creates a new Headers value object
     */
    public static function create(): self
    {
        return new self([]);
    }

    /**
     * Creates a new Headers value object with the given API token.
     */
    public static function withAuthorization(ApiKey $apiKey): self
    {
        return new self([
            'Authorization' => "Bearer {$apiKey->toString()}",
        ]);
    }

    /**
     * Create a new Headers value object with the given user agent and existing headers.
     */
    public function withUserAgent(string $name, string $version): self
    {
        return new self([
            ...$this->headers,
            'User-Agent' => $name.'/'.$version,
        ]);
    }

    /**
     * Creates a new Headers value object, with the given content type, and the existing headers.
     */
    public function withContentType(ContentType $contentType, string $suffix = ''): self
    {
        return new self([
            ...$this->headers,
            'Content-Type' => $contentType->value.$suffix,
        ]);
    }

    /**
     * Creates a new Headers value object, with the newly added header, and the existing headers.
     */
    public function withCustomHeader(string $name, string $value): self
    {
        return new self([
            ...$this->headers,
            $name => $value,
        ]);
    }

    /**
     * Create a new Headers value object with the given idempotency key and existing headers.
     */
    public function withIdempotencyKey(string $key): self
    {
        return new self([
            ...$this->headers,
            'Idempotency-Key' => $key,
        ]);
    }

    /**
     * @return array<string, string> $headers
     */
    public function toArray(): array
    {
        return $this->headers;
    }
}
