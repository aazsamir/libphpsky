<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\MuteThread;

/**
 * Mutes a thread preventing notifications from the thread and any of its children. Mutes are private in Bluesky. Requires auth.
 * procedure
 */
class MuteThread implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.muteThread';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
