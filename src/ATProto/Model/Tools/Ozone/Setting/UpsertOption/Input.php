<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.setting.upsertOption';

    public string $key;
    public string $scope;
    public mixed $value;
    public ?string $description = null;
    public ?string $managerRole = null;

    public static function id(): string
    {
        return self::ID;
    }
}
