<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata;

/**
 * object
 */
class Metadata implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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

    public static function new(int $messagesSent, int $messagesReceived, int $convos, int $convosStarted): self
    {
        $instance = new self();
        $instance->messagesSent = $messagesSent;
        $instance->messagesReceived = $messagesReceived;
        $instance->convos = $convos;
        $instance->convosStarted = $convosStarted;

        return $instance;
    }
}
