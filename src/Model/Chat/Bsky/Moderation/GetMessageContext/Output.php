<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.moderation.getMessageContext';

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView> */
    public array $messages = [];

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
        return ['messages'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView> $messages
     */
    public static function new(array $messages): self
    {
        $instance = new self();
        $instance->messages = $messages;

        return $instance;
    }
}
