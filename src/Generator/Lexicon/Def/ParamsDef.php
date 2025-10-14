<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class ParamsDef implements Def, DefContainer
{
    /**
     * @param string[]|null $required
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private Defs $properties,
        private ?array $required = null,
        private ?string $description = null,
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

    public function description(): ?string
    {
        return $this->description;
    }

    public function defs(): Defs
    {
        return $this->properties;
    }
}
