<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

/**
 * @internal
 */
final class IOData
{
    public function __construct(
        private readonly string $encoding,
        private readonly ?string $description = null,
        private readonly ?Def $schema = null,
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
