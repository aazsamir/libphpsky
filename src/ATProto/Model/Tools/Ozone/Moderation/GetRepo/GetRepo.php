<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRepo;

/**
 * Get details about a repository.
 * query
 */
class GetRepo implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getRepo';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
