<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\LeaveConvo;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.leaveConvo';

    public string $convoId;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $convoId): self
    {
        $instance = new self();
        $instance->convoId = $convoId;

        return $instance;
    }
}
