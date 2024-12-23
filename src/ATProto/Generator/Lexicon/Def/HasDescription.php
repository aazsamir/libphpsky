<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def;

interface HasDescription
{
    public function description(): ?string;
}
