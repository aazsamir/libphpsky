<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig;

/**
 * Get details about ozone's server configuration.
 * query
 */
class GetConfig implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.server.getConfig';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
