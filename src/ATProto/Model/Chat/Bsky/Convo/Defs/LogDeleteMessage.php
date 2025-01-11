<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class LogDeleteMessage implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'logDeleteMessage';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\DeletedMessageView */
    public mixed $message;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $rev, string $convoId, MessageView|DeletedMessageView $message): self
    {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;
        $instance->message = $message;

        return $instance;
    }
}
