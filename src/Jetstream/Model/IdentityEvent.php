<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

readonly class IdentityEvent implements Event
{
    public function __construct(
        public string $did,
        public \DateTimeInterface $timeUs,
        public Kind $kind,
        public Identity $identity,
    ) {}

    public function did(): string
    {
        return $this->did;
    }

    public function timeUs(): \DateTimeInterface
    {
        return $this->timeUs;
    }

    public function kind(): Kind
    {
        return $this->kind;
    }
}