<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

readonly class MstEntry
{
    public function __construct(
        public int $prefixLength,
        public string $keySuffix,
        public string $value,
        public ?string $tree,
    ) {}

    /**
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): self
    {
        \assert(is_numeric($data['p']));
        \assert(\is_string($data['k']));
        \assert(\is_string($data['v']));
        \assert(null === $data['t'] || \is_string($data['t']));

        return new self(
            prefixLength: (int) $data['p'],
            keySuffix: $data['k'],
            value: $data['v'],
            tree: $data['t'] ?? null,
        );
    }
}
