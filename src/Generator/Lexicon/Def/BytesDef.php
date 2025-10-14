<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class BytesDef implements Def
{
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?int $minLength = null,
        private ?int $maxLength = null,
        private ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::BYTES;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function minLength(): ?int
    {
        return $this->minLength;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function maxLength(): ?int
    {
        return $this->maxLength;
    }
}
