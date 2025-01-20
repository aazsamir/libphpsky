<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;
use Aazsamir\Libphpsky\Generator\Prefab\ToArray;

class BlobProperty
{
    use FromArray;
    use ToArray;

    public const NAME = 'blob';
    public const ID = 'test.fixtures';

    public string $blob;
}
