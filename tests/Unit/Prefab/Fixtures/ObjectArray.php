<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;

class ObjectArray
{
    use FromArray;
    use ToArray;

    public const NAME = 'object';
    public const ID = 'test.fixtures';

    /** @var array<\Tests\Unit\Prefab\Fixtures\PlainObject> */
    public array $objects;
}
