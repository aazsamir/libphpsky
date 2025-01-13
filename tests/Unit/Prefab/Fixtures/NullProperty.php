<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

class NullProperty
{
    use FromArray;
    use ToArray;

    public const NAME = 'null';
    public const ID = 'test.fixtures';

    public ?int $id = null;
}
