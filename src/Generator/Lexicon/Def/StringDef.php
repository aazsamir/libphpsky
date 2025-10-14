<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class StringDef implements Def
{
    /**
     * @param string[]|null $knownValues
     * @param string[]|null $enum
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?string $format = null,
        private ?int $maxLength = null,
        private ?int $minLength = null,
        private ?int $maxGraphenes = null,
        private ?int $minGraphenes = null,
        private ?array $knownValues = null,
        private ?array $enum = null,
        private ?string $default = null,
        private ?string $const = null,
        private ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::STRING;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function format(): ?string
    {
        return $this->format;
    }

    public function maxLength(): ?int
    {
        return $this->maxLength;
    }

    public function minLength(): ?int
    {
        return $this->minLength;
    }

    public function maxGraphenes(): ?int
    {
        return $this->maxGraphenes;
    }

    public function minGraphenes(): ?int
    {
        return $this->minGraphenes;
    }

    /**
     * @return string[]|null
     */
    public function knownValues(): ?array
    {
        return $this->knownValues;
    }

    /**
     * @return string[]|null
     */
    public function enum(): ?array
    {
        return $this->enum;
    }

    public function default(): ?string
    {
        return $this->default;
    }

    public function const(): ?string
    {
        return $this->const;
    }

    public function description(): ?string
    {
        return $this->description;
    }
}
