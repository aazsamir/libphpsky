<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;

/**
 * @internal
 */
interface LoaderInterface
{
    public function load(MakeConfig $config): Lexicons;
}
