<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\Defs;

/**
 * object
 */
class Option implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'option';
    public const ID = 'tools.ozone.setting.defs';

    public string $key;
    public string $did;
    public mixed $value;
    public ?string $description = null;
    public ?string $createdAt = null;
    public ?string $updatedAt = null;
    public ?string $managerRole = null;
    public string $scope;
    public string $createdBy;
    public string $lastUpdatedBy;

    public static function id(): string
    {
        return self::ID;
    }
}
