<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class BooleanDef implements Def
{
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?bool $default = null,
        private ?bool $const = null,
        private ?string $description = null,
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

    public function description(): ?string
    {
        return $this->description;
    }

    public function const(): ?bool
    {
        return $this->const;
    }
}
