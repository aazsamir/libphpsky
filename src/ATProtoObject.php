<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky;

interface ATProtoObject
{
    public static function id(): string;

    public static function name(): string;

    public static function fromArray(mixed $data): self;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * @return string[]
     */
    public static function nullable(): array;

    /**
     * @return string[]
     */
    public static function required(): array;
}
