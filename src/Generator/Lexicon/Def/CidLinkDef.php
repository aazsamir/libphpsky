<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class CidLinkDef implements Def
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::CID_LINK;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }
}
