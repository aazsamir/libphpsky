<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * Create or update setting option
 * procedure
 */
class UpsertOption implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.setting.upsertOption';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\UpsertOption\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
