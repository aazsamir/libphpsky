<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class UnionDef implements Def
{
    /**
     * @var Def[]
     */
    private array $resolvedRefs;

    /**
     * @param string[] $refs
     */
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly array $refs,
        private readonly ?bool $closed = null,
        private readonly ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::UNION;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    /**
     * @return string[]
     */
    public function refs(): array
    {
        return $this->refs;
    }

    public function closed(): ?bool
    {
        return $this->closed;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * @param Def[] $resolvedRefs
     */
    public function setResolvedRefs(array $resolvedRefs): void
    {
        $this->resolvedRefs = $resolvedRefs;
    }

    /**
     * @return Def[]
     */
    public function resolvedRefs(): array
    {
        return $this->resolvedRefs;
    }
}
