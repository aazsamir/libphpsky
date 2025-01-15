<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.muteConvo';

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
