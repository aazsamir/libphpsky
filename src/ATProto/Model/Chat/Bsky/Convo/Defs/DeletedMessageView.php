<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class DeletedMessageView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'deletedMessageView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;
    public ?MessageViewSender $sender = null;
    public string $sentAt;

    public static function id(): string
    {
        return self::ID;
    }
}
