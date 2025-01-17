<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Type;

use Psr\Http\Message\UriInterface;

interface ATUriInterface extends UriInterface
{
    public static function fromString(string $uri): self;

    public function getDid(): string;

    public function getCollection(): string;

    public function getRecordKey(): string;

    public function toString(): string;

    public function clone(): static;
}
