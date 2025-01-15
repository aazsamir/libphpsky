<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getMessages';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView> */
    public array $messages = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView> $messages
     */
    public static function new(array $messages, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->messages = $messages;
        $instance->cursor = $cursor;

        return $instance;
    }
}
