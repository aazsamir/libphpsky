<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

/**
 * @internal
 */
readonly final class MakeConfig
{
    public function __construct(
        public string $path,
        public string $namespace,
    ) {}
}
