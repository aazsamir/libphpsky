<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\RemoveRule;

/**
 * Remove an existing URL safety rule
 * procedure
 */
class RemoveRule implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.safelink.removeRule';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\Event
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\Event::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
