<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

/**
 * @internal
 */
interface HasDescription
{
    public function description(): ?string;
}
