<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

class TokenDef implements Def
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::TOKEN;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }
}
