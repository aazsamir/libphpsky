<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetConfig;

/**
 * Get miscellaneous runtime configuration.
 * query
 */
class GetConfig implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getConfig';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetConfig\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
