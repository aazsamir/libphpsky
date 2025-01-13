<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

class ObjectProperty
{
    use FromArray;
    use ToArray;

    public const NAME = 'objectProperty';
    public const ID = 'test.fixtures';

    public ?NullProperty $prop;
}
