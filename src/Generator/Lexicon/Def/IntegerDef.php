<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

class IntegerDef implements Def
{
    /**
     * @param string[]|null $enum
     */
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?int $minimum = null,
        private readonly ?int $maximum = null,
        private readonly ?array $enum = null,
        private readonly ?int $default = null,
        private readonly ?int $const = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::INTEGER;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function minimum(): ?int
    {
        return $this->minimum;
    }

    public function maximum(): ?int
    {
        return $this->maximum;
    }

    /**
     * @return string[]|null
     */
    public function enum(): ?array
    {
        return $this->enum;
    }

    public function default(): ?int
    {
        return $this->default;
    }

    public function const(): ?int
    {
        return $this->const;
    }
}
