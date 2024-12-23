<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\RemoveOptions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.setting.removeOptions';

    /** @var string[] */
    public array $keys = [];
    public string $scope;

    public static function id(): string
    {
        return self::ID;
    }
}
