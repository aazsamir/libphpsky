<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers;

/**
 * List all members with access to the ozone service.
 * query
 */
class ListMembers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.listMembers';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListMembers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
