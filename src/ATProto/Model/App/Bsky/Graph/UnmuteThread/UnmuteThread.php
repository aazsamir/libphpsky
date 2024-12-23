<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\UnmuteThread;

/**
 * Unmutes the specified thread. Requires auth.
 * procedure
 */
class UnmuteThread implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.unmuteThread';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
