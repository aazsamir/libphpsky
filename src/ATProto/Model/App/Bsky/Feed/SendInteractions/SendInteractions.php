<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\SendInteractions;

/**
 * Send information about interactions with feed items back to the feed generator that served them.
 * procedure
 */
class SendInteractions implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.sendInteractions';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\SendInteractions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
