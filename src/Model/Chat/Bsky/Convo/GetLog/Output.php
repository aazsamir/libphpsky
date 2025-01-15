<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetLog;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getLog';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogBeginConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogLeaveConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogCreateMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogDeleteMessage> */
    public array $logs = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogBeginConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogLeaveConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogCreateMessage|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\LogDeleteMessage> $logs
     */
    public static function new(array $logs, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->logs = $logs;
        $instance->cursor = $cursor;

        return $instance;
    }
}