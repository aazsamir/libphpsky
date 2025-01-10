<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\LeaveConvo;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.leaveConvo';

    public string $convoId;
    public string $rev;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $convoId, string $rev): self
    {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->rev = $rev;

        return $instance;
    }
}
