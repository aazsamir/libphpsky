<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

readonly class CarRepo
{
    /**
     * @param array<string, CarRoot> $roots
     * @param array<string, mixed> $blocks
     */
    public function __construct(
        public array $roots,
        public array $blocks,
    ) {}
}
