<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\RemoveOptions;

/**
 * Delete settings by key
 * procedure
 */
class RemoveOptions implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.setting.removeOptions';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\RemoveOptions\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
