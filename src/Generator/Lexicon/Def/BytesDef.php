<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class BytesDef implements Def
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?int $minLength = null,
        private readonly ?int $maxLength = null,
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

    public function maxLength(): ?int
    {
        return $this->maxLength;
    }
}
