<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;

/**
 * @internal
 */
class UnknownProperty
{
    use FromArray;

    public mixed $unknown;
}
