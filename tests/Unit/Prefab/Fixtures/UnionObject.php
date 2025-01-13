<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

class UnionObject
{
    use FromArray;
    use ToArray;

    public const NAME = 'union';
    public const ID = 'test.fixtures';

    /** @var Tests\Unit\Prefab\Fixtures\PlainObject|\Tests\Unit\Prefab\Fixtures\NullProperty */
    public mixed $union;
}
