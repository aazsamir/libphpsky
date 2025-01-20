<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

readonly class Account
{
    public function __construct(
        public bool $active,
        public string $did,
        public int $seq,
        public \DateTimeInterface $time,
    ) {}
}
