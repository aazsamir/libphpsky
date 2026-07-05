<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

readonly class MstNode
{
    /**
     * @param MstEntry[] $entries
     */
    public function __construct(
        public ?string $left,
        public array $entries = [],
    ) {}

    /**
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): self
    {
        \assert(null === $data['l'] || \is_string($data['l']));
        \assert(\is_array($data['e']));

        $entries = [];

        foreach ($data['e'] as $entry) {
            \assert(\is_array($entry));
            $entries[] = MstEntry::fromArray($entry);
        }

        return new self(
            left: $data['l'] ?? null,
            entries: $entries,
        );
    }
}
