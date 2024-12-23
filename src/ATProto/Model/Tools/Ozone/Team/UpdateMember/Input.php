<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\UpdateMember;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.team.updateMember';

    public string $did;
    public ?bool $disabled = null;
    public ?string $role = null;

    public static function id(): string
    {
        return self::ID;
    }
}
