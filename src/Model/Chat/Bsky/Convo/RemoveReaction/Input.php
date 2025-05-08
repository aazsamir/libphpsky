<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\RemoveReaction;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.removeReaction';

    public string $convoId;
    public string $messageId;
    public string $value;

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
        return ['convoId', 'messageId', 'value'];
    }

    public static function new(string $convoId, string $messageId, string $value): self
    {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->messageId = $messageId;
        $instance->value = $value;

        return $instance;
    }
}
