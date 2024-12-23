<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\LexiconType;

class BlobDef implements Def
{
    /**
     * @param array<mixed>|null $accept
     */
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?array $accept = null,
        private readonly ?int $maxSize = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::BLOB;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    /**
     * @return array<mixed>|null
     */
    public function accept(): ?array
    {
        return $this->accept;
    }

    public function maxSize(): ?int
    {
        return $this->maxSize;
    }
}
