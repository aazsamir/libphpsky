<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

/**
 * @internal
 */
readonly final class MakeConfig
{
    /**
     * @param MakeConfigEntry[] $entries
     */
    public function __construct(
        public array $entries,
    ) {
        if (empty($entries)) {
            throw new \InvalidArgumentException('At least one MakeConfigEntry is required.');
        }
    }

    public static function default(): self
    {
        return new self([
            new MakeConfigEntry(
                lexiconsPath: __DIR__ . '/../../../lexicons',
                path: __DIR__ . '/../../Model',
                namespace: 'Aazsamir\Libphpsky\Model',
                generate: false,
                metaClient: false,
            ),
        ]);
    }

    public function with(MakeConfigEntry ...$entries): self
    {
        return new self([...$this->entries, ...$entries]);
    }
}
