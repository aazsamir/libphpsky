<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata;

/**
 * query
 */
class GetActorMetadata implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.getActorMetadata';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $actor): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
