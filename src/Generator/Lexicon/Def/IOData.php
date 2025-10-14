<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

/**
 * @internal
 */
final readonly class IOData
{
    public function __construct(
        private string $encoding,
        private ?string $description = null,
        private ?Def $schema = null,
    ) {}

    public function description(): ?string
    {
        return $this->description;
    }

    public function encoding(): string
    {
        return $this->encoding;
    }

    public function schema(): ?Def
    {
        return $this->schema;
    }
}
