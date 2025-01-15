<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

interface HasDescription
{
    public function description(): ?string;
}
