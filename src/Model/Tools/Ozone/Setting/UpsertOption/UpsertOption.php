<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * Create or update setting option
 * procedure
 */
class UpsertOption implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.setting.upsertOption';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
