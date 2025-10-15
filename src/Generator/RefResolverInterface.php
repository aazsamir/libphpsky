<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;

/**
 * @internal
 */
interface RefResolverInterface
{
    public function resolveRefs(Lexicons $lexicons): Lexicons;

    public function resolveLexicon(Lexicons $lexicons, Lexicon $lexicon): void;

    public function resolveDef(Lexicons $lexicons, Lexicon $lexicon, Def $def): void;
}
