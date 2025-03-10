<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\FromArray;
use Aazsamir\Libphpsky\Generator\Prefab\ToArray;

class PlainObject
{
    use FromArray;
    use ToArray;

    public const NAME = 'plain';
    public const ID = 'test.fixtures';

    public int $id;
    public string $name;
    public ?string $description;
    public bool $active;
    /** @var array<string> */
    public array $tags;
}
