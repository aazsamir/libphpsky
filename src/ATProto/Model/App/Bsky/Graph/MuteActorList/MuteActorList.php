<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\MuteActorList;

/**
 * Creates a mute relationship for the specified list of accounts. Mutes are private in Bluesky. Requires auth.
 * procedure
 */
class MuteActorList implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.muteActorList';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
