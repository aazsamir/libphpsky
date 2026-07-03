<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * Placeholder embedded in place of a reply's parent message when that parent was sent before the viewer joined the group convo. The viewer has no access to that history, so no message data is carried.
 * object
 */
class MessageBeforeUserJoinedGroupView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageBeforeUserJoinedGroupView';
    public const ID = 'chat.bsky.convo.defs';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return [];
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
