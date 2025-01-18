<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;
use Aazsamir\Libphpsky\Generator\Prefab\ToArray;

class ObjectProperty
{
    use FromArray;
    use ToArray;

    public const NAME = 'objectProperty';
    public const ID = 'test.fixtures';

    public ?NullProperty $prop;
}
