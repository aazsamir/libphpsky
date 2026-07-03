<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * Event indicating a join link was enabled for a group convo.
 * object
 */
class LogEnableJoinLink implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logEnableJoinLink';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView A system message with data of type #systemMessageDataEnableJoinLink */
    public ?SystemMessageView $message;

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
        return ['rev', 'convoId', 'message'];
    }

    public static function new(string $rev, string $convoId, ?SystemMessageView $message = null): self
    {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;
        if ($message !== null) {
            $instance->message = $message;
        }

        return $instance;
    }
}
