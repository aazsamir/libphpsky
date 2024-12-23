<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto;

interface ATProtoObject
{
    public static function fromArray(mixed $data): self;
}
