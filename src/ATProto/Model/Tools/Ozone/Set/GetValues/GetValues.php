<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\GetValues;

/**
 * Get a specific set and its values
 * query
 */
class GetValues implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.getValues';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $name, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\GetValues\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
