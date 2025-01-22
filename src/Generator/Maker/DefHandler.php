<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;

/**
 * @internal
 */
interface DefHandler
{
    public function handle(Def $def): void;
}
