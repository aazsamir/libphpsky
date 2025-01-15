<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoForMembers;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getConvoForMembers';

    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null): self
    {
        $instance = new self();
        $instance->convo = $convo;

        return $instance;
    }
}
