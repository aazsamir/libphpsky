<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;

/**
 * @internal
 */
interface MakerInterface
{
    public function make(Lexicons $lexicons): void;
}
