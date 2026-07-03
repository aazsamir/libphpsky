<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetMessages;

/**
 * object
 */
class GetMessagesOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getMessages';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView> */
    public array $messages = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> Set of all members who authored or reacted to the returned messages. Members referred to by system messages are also included. */
    public ?array $relatedProfiles = [];

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
        return ['messages'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView> $messages
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> $relatedProfiles
     */
    public static function new(array $messages, ?string $cursor = null, ?array $relatedProfiles = []): self
    {
        $instance = new self();
        $instance->messages = $messages;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($relatedProfiles !== null) {
            $instance->relatedProfiles = $relatedProfiles;
        }

        return $instance;
    }
}
