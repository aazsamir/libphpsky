<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getLog';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogBeginConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogAcceptConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogLeaveConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogMuteConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogUnmuteConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogCreateMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogDeleteMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogReadMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogAddReaction|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogRemoveReaction> */
    public array $logs = [];

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
        return ['logs'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogBeginConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogAcceptConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogLeaveConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogMuteConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogUnmuteConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogCreateMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogDeleteMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogReadMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogAddReaction|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogRemoveReaction> $logs
     */
    public static function new(array $logs, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->logs = $logs;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
