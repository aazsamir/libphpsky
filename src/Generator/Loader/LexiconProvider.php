<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Loader;

use Generator;

interface LexiconProvider
{
    /**
     * @return Generator<int, array{
     *  lexicon: int,
     *  id: string,
     *  revision?: int,
     *  description?: ?string,
     *  defs: array<string, array<string, mixed>>
     * }>
     */
    public function provide(): \Generator;
}
