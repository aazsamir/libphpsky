<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.updateRead';

    public string $convoId;
    public ?string $messageId;

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
        return ['convoId'];
    }

    public static function new(string $convoId, ?string $messageId = null): self
    {
        $instance = new self();
        $instance->convoId = $convoId;
        if ($messageId !== null) {
            $instance->messageId = $messageId;
        }

        return $instance;
    }
}
