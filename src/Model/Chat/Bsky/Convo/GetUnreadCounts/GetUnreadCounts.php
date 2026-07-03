<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetUnreadCounts;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Returns unread conversation counts for conversations that are unlocked, not muted, split by convo status. Direct convos are excluded when a block relationship exists between the actor and the other member, or when the other member's account is deleted or deactivated. Group convos are considered unread if they have unread join request counts.
 * query
 */
class GetUnreadCounts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getUnreadCounts';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?bool $includeGroupChats When false, group convos are excluded from the counts.
     */
    public function query(?bool $includeGroupChats = null): GetUnreadCountsOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetUnreadCounts\GetUnreadCountsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?bool $includeGroupChats When false, group convos are excluded from the counts.
     * @return array<string, mixed>
     */
    public function rawQuery(?bool $includeGroupChats = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
