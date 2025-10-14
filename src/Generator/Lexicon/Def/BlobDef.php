<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class BlobDef implements Def
{
    /**
     * @param array<mixed>|null $accept
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?array $accept = null,
        private ?int $maxSize = null,
        private ?string $description = null,
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

    public function description(): ?string
    {
        return $this->description;
    }

    public function maxSize(): ?int
    {
        return $this->maxSize;
    }
}
