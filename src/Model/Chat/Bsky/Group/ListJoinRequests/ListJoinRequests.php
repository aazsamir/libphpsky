<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ListJoinRequests;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Lists a page of request to join a group (via join link) the user owns. Shows the data from the owner's point of view.
 * query
 */
class ListJoinRequests implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.listJoinRequests';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $convoId, ?int $limit = null, ?string $cursor = null): ListJoinRequestsOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ListJoinRequests\ListJoinRequestsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
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
