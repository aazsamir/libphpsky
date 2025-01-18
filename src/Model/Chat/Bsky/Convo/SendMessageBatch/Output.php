<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.sendMessageBatch';

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView> */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView> $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
