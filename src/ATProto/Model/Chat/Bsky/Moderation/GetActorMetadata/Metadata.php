<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Moderation\GetActorMetadata;

/**
 * object
 */
class Metadata implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'metadata';
    public const ID = 'chat.bsky.moderation.getActorMetadata';

    public int $messagesSent;
    public int $messagesReceived;
    public int $convos;
    public int $convosStarted;

    public static function id(): string
    {
        return self::ID;
    }
}
