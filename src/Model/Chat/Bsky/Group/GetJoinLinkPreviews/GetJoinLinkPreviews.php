<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreviews;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Get public information about groups from join links. Invalid or disabled codes are silently omitted from results.
 * query
 */
class GetJoinLinkPreviews implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.getJoinLinkPreviews';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $codes
     */
    public function query(array $codes): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreviews\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $codes
     * @return array<string, mixed>
     */
    public function rawQuery(array $codes): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
