<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoAvailability;

/**
 * Get whether the requester and the other members can chat. If an existing convo is found for these members, it is returned.
 * query
 */
class GetConvoAvailability implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getConvoAvailability';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $members
     */
    public function query(array $members): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvoAvailability\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $members
     * @return array<string, mixed>
     */
    public function rawQuery(array $members): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
