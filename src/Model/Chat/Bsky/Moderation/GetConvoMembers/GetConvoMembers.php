<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvoMembers;

/**
 * Returns a paginated list of members from a conversation, for moderation purposes. Does not require the requester to be a member of the conversation.
 * query
 */
class GetConvoMembers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getConvoMembers';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $convoId, ?int $limit = null, ?string $cursor = null): GetConvoMembersOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvoMembers\GetConvoMembersOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $convoId, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
