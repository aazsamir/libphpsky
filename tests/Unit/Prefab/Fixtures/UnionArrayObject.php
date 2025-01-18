<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;
use Aazsamir\Libphpsky\Generator\Prefab\ToArray;

class UnionArrayObject
{
    use FromArray;
    use ToArray;

    public const NAME = 'unionArray';
    public const ID = 'test.fixtures';

    /** @var array<Tests\Unit\Prefab\Fixtures\PlainObject|\Tests\Unit\Prefab\Fixtures\NullProperty> */
    public array $union;
}
