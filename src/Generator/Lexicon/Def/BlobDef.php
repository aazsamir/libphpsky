<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class BlobDef implements Def
{
    /**
     * @param array<mixed>|null $accept
     */
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?array $accept = null,
        private readonly ?int $maxSize = null,
        private readonly ?string $description = null,
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
