<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer;

/**
 * Describes the server's account creation requirements and capabilities. Implemented by PDS.
 * query
 */
class DescribeServer implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.describeServer';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
