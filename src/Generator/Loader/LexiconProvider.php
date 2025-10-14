<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;

/**
 * @internal
 *
 * @phpstan-type LexiconData array{
 *  lexicon: int,
 *  id: string,
 *  revision?: int,
 *  description?: ?string,
 *  defs: array<string, array<string, mixed>>
 * }
 */
interface LexiconProvider
{
    /**
     * @return \Generator<int, array{0: LexiconData, 1: MakeConfigEntry}>
     */
    public function provide(MakeConfig $config): \Generator;
}
