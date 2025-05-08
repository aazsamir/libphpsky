<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class ReactionView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reactionView';
    public const ID = 'chat.bsky.convo.defs';

    public string $value;
    public ?ReactionViewSender $sender;
    public \DateTimeInterface $createdAt;

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
        return ['value', 'sender', 'createdAt'];
    }

    public static function new(string $value, \DateTimeInterface $createdAt, ?ReactionViewSender $sender = null): self
    {
        $instance = new self();
        $instance->value = $value;
        $instance->createdAt = $createdAt;
        if ($sender !== null) {
            $instance->sender = $sender;
        }

        return $instance;
    }
}
