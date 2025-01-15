<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

class Defs
{
    /**
     * @param Def[] $defs
     */
    public function __construct(
        private array $defs,
    ) {}

    /**
     * @return Def[]
     */
    public function toArray(): array
    {
        return $this->defs;
    }
}
