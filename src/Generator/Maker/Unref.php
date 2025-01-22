<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;

trait Unref
{
    private function unref(Def $def): Def
    {
        while ($def instanceof RefDef) {
            /** @var RefDef $def */
            $def = $def->resolvedDef();
        }

        return $def;
    }
}
