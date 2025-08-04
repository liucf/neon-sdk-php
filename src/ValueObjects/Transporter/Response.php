<?php

declare(strict_types=1);

namespace Neon\ValueObjects\Transporter;

/**
 * @template TData of array|string
 *
 * @internal
 */
final class Response
{
    /**
     * Creates a new Response value object.
     *
     * @param  TData  $data
     */
    private function __construct(
        private readonly array|string $data,
    ) {
        // ..
    }

    /**
     * Creates a new Response value object from the given data.
     *
     * @param  TData  $data
     * @return Response<TData>
     */
    public static function from(array|string $data): self
    {

        return new self($data);
    }

    /**
     * Returns the response data.
     *
     * @return TData
     */
    public function data(): array|string
    {
        return $this->data;
    }
}
