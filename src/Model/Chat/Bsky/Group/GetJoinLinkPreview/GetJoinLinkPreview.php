<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreview;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Get public information about a group from an join link.
 * query
 */
class GetJoinLinkPreview implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.getJoinLinkPreview';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $code): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreview\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $code): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
