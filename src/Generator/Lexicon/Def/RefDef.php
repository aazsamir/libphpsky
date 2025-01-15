<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

class RefDef implements Def
{
    private Def $resolvedDef;

    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly string $ref,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::REF;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function ref(): string
    {
        return $this->ref;
    }

    public function setResolvedDef(Def $def): void
    {
        $this->resolvedDef = $def;
    }

    public function resolvedDef(): Def
    {
        return $this->resolvedDef;
    }
}
