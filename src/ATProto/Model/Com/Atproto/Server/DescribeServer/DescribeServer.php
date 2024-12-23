<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\DescribeServer;

/**
 * Describes the server's account creation requirements and capabilities. Implemented by PDS.
 * query
 */
class DescribeServer implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.describeServer';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\DescribeServer\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
