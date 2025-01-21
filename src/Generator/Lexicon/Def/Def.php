<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
interface Def
{
    public function type(): LexiconType;

    public function name(): string;

    public function lexicon(): Lexicon;

    public function description(): ?string;
}
