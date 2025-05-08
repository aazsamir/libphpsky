<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageAndReactionView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageAndReactionView';
    public const ID = 'chat.bsky.convo.defs';

    public ?MessageView $message;
    public ?ReactionView $reaction;

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
        return ['message', 'reaction'];
    }

    public static function new(?MessageView $message = null, ?ReactionView $reaction = null): self
    {
        $instance = new self();
        if ($message !== null) {
            $instance->message = $message;
        }
        if ($reaction !== null) {
            $instance->reaction = $reaction;
        }

        return $instance;
    }
}
