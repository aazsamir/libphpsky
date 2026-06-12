<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Event indicating the viewer withdrew their own join request. Only requester actor gets this.
 * object
 */
class LogWithdrawOutgoingJoinRequest implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logWithdrawOutgoingJoinRequest';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

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
        return ['rev', 'convoId'];
    }

    public static function new(string $rev, string $convoId): self
    {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;

        return $instance;
    }
}
