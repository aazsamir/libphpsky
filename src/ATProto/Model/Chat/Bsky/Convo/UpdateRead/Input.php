<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\UpdateRead;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.updateRead';

    public string $convoId;
    public ?string $messageId = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $convoId, ?string $messageId = null): self
    {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->messageId = $messageId;

        return $instance;
    }
}
