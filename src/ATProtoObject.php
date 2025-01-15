<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky;

interface ATProtoObject
{
    public static function fromArray(mixed $data): self;
}
