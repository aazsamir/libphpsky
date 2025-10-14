<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

readonly class MakeConfigEntry
{
    public function __construct(
        public string $lexiconsPath,
        public string $path,
        public string $namespace,
        public bool $metaClient,
        public bool $generate,
    ) {}
}
