<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class IntegerDef implements Def
{
    /**
     * @param string[]|null $enum
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?int $minimum = null,
        private ?int $maximum = null,
        private ?array $enum = null,
        private ?int $default = null,
        private ?int $const = null,
        private ?string $description = null,
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

    public function description(): ?string
    {
        return $this->description;
    }
}
