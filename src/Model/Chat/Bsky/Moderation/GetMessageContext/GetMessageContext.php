<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext;

/**
 * query
 */
class GetMessageContext implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getMessageContext';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $convoId Conversation that the message is from. NOTE: this field will eventually be required.
     * @param ?int $before Number of user messages before the target to include. System messages between the earliest returned user message and the target are also included, capped per gap by `maxInterleavedSystemMessages`. If there are no user messages before the target, up to `maxInterleavedSystemMessages` system messages immediately preceding the target are returned instead.
     * @param ?int $after Number of user messages after the target to include. System messages between the target and the latest returned user message are also included, capped per gap by `maxInterleavedSystemMessages`. If there are no user messages after the target, up to `maxInterleavedSystemMessages` system messages immediately following the target are returned instead.
     * @param ?int $maxInterleavedSystemMessages Maximum number of system messages to include per gap between consecutive returned messages (and per side when there are no user messages on that side). Within a gap, the system messages closest to the earlier message are kept.
     */
    public function query(
        string $messageId,
        ?string $convoId = null,
        ?int $before = null,
        ?int $after = null,
        ?int $maxInterleavedSystemMessages = null,
    ): GetMessageContextOutput {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\GetMessageContextOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $convoId Conversation that the message is from. NOTE: this field will eventually be required.
     * @param ?int $before Number of user messages before the target to include. System messages between the earliest returned user message and the target are also included, capped per gap by `maxInterleavedSystemMessages`. If there are no user messages before the target, up to `maxInterleavedSystemMessages` system messages immediately preceding the target are returned instead.
     * @param ?int $after Number of user messages after the target to include. System messages between the target and the latest returned user message are also included, capped per gap by `maxInterleavedSystemMessages`. If there are no user messages after the target, up to `maxInterleavedSystemMessages` system messages immediately following the target are returned instead.
     * @param ?int $maxInterleavedSystemMessages Maximum number of system messages to include per gap between consecutive returned messages (and per side when there are no user messages on that side). Within a gap, the system messages closest to the earlier message are kept.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $messageId,
        ?string $convoId = null,
        ?int $before = null,
        ?int $after = null,
        ?int $maxInterleavedSystemMessages = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
