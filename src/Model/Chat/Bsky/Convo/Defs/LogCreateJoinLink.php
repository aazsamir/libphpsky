<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Event indicating a join link was created for a group convo.
 * object
 */
class LogCreateJoinLink implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logCreateJoinLink';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView A system message with data of type #systemMessageDataCreateJoinLink */
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
