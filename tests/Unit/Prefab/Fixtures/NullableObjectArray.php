<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;
use Aazsamir\Libphpsky\Generator\Prefab\ToArray;

class NullableObjectArray
{
    use FromArray;
    use ToArray;

    public const NAME = 'nullable';
    public const ID = 'test.fixtures';

    /** @var array<\Tests\Unit\Prefab\Fixtures\PlainObject>|null */
    public ?array $objects;
}
