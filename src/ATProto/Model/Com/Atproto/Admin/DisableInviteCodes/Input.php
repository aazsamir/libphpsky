<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\DisableInviteCodes;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.disableInviteCodes';

    /** @var string[] */
    public ?array $codes = [];

    /** @var string[] */
    public ?array $accounts = [];

    public static function id(): string
    {
        return self::ID;
    }
}
