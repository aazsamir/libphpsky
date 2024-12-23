<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Maker;

readonly class MakeConfig
{
    public function __construct(
        public string $path,
        public string $namespace,
        public string $mainClass,
    ) {}
}
