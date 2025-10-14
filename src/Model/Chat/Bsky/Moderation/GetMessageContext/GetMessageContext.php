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
     */
    public function query(string $messageId, ?string $convoId = null, ?int $before = null, ?int $after = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetMessageContext\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $convoId Conversation that the message is from. NOTE: this field will eventually be required.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $messageId,
        ?string $convoId = null,
        ?int $before = null,
        ?int $after = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
