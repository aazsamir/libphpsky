<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\MuteConvo;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.muteConvo';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null): self
    {
        $instance = new self();
        $instance->convo = $convo;

        return $instance;
    }
}
