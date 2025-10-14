<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class ObjectDef implements Def, DefContainer
{
    /**
     * @param string[]|null $required
     * @param string[]|null $nullable
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private Defs $properties,
        private ?array $required = null,
        private ?array $nullable = null,
        private ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::OBJECT;
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

    /**
     * @return string[]|null
     */
    public function nullable(): ?array
    {
        return $this->nullable;
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
