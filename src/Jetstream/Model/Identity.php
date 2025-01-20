<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

readonly class Identity
{
    public function __construct(
        public string $did,
        public string $handle,
        public int $seq,
        public \DateTimeInterface $time,
    ) {}
}
