<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class LogDeleteMessage implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logDeleteMessage';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView */
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
