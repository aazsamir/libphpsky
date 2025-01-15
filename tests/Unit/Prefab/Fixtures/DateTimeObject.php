<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;

class DateTimeObject
{
    use FromArray;
    use ToArray;

    public const NAME = 'null';
    public const ID = 'test.fixtures';

    public \DateTimeInterface $date;
}