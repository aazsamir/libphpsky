<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\ListMembers;

/**
 * List all members with access to the ozone service.
 * query
 */
class ListMembers implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.listMembers';

    public static function id(): string
    {
        return self::ID;
    }

    function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\ListMembers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
