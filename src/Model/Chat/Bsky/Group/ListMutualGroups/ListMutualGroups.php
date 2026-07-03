<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ListMutualGroups;

/**
 * Returns a page of group conversations that both the requester and the specified actor are members of.
 * query
 */
class ListMutualGroups implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.listMutualGroups';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $subject, ?int $limit = null, ?string $cursor = null): ListMutualGroupsOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ListMutualGroups\ListMutualGroupsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $subject, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
