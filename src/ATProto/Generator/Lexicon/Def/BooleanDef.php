<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\LexiconType;

class BooleanDef implements Def
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?bool $default = null,
        private readonly ?bool $const = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::BOOLEAN;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function default(): ?bool
    {
        return $this->default;
    }

    public function const(): ?bool
    {
        return $this->const;
    }
}
