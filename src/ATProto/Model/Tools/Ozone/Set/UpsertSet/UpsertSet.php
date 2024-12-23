<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\UpsertSet;

/**
 * Create or update set metadata
 * procedure
 */
class UpsertSet implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.upsertSet';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(
        \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\Set $input,
    ): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
