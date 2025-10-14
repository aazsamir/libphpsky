<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

/**
 * @internal
 */
final readonly class Message
{
    public function __construct(
        private UnionDef $schema,
        private ?string $description = null,
    ) {}

    public function schema(): UnionDef
    {
        return $this->schema;
    }

    public function description(): ?string
    {
        return $this->description;
    }
}
