<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\UpsertSet;

/**
 * Create or update set metadata
 * procedure
 */
class UpsertSet implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.upsertSet';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\Set $input,
    ): \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\SetView {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\SetView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
