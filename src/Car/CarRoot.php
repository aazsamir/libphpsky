<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

readonly class CarRoot
{
    public function __construct(
        public string $did,
        public string $rev,
        public string $sig,
        public string $data,
        public ?string $prev,
        public int $version,
    ) {}

    /**
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): self
    {
        \assert(\is_string($data['did']));
        \assert(\is_string($data['rev']));
        \assert(\is_string($data['sig']));
        \assert(\is_string($data['data']));
        \assert(is_numeric($data['version']));
        \assert($data['prev'] === null || \is_string($data['prev']));

        return new self(
            did: $data['did'],
            rev: $data['rev'],
            sig: $data['sig'],
            data: $data['data'],
            prev: $data['prev'] ?? null,
            version: (int) $data['version'],
        );
    }
}
