<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

interface Event
{
    public function did(): string;
    public function timeUs(): \DateTimeInterface;
    public function kind(): Kind;
}