<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.sendMessageBatch';

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\BatchItem> */
    public array $items = [];

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
        return ['items'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch\BatchItem> $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
