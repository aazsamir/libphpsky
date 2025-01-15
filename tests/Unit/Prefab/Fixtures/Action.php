<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

use Aazsamir\Libphpsky\Generator\Prefab\IsAction;

class Action
{
    use IsAction;

    public static function id(): string
    {
        return 'test.fixtures';
    }

    public function query(string $string, int $int, ?NullProperty $input = null): mixed
    {
        return $this->performRequest($this->getArgsWithKeys(\func_get_args(), 'query'), 'GET');
    }
}
