<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

readonly class MakeConfig
{
    public function __construct(
        public string $path,
        public string $namespace,
    ) {}
}
