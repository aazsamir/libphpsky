<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

class ParamsDef implements Def, DefContainer
{
    /**
     * @param string[]|null $required
     */
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly Defs $properties,
        private readonly ?array $required = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::PARAMS;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function properties(): Defs
    {
        return $this->properties;
    }

    /**
     * @return string[]|null
     */
    public function required(): ?array
    {
        return $this->required;
    }

    public function defs(): Defs
    {
        return $this->properties;
    }
}
