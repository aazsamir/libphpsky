<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\AddReaction;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.addReaction';

    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView $message;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['message'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView $message = null): self
    {
        $instance = new self();
        if ($message !== null) {
            $instance->message = $message;
        }

        return $instance;
    }
}
