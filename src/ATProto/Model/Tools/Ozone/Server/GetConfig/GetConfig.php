<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Server\GetConfig;

/**
 * Get details about ozone's server configuration.
 * query
 */
class GetConfig implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.server.getConfig';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Server\GetConfig\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
