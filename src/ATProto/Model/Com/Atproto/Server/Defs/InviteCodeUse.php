<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs;

/**
 * object
 */
class InviteCodeUse implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'inviteCodeUse';
    public const ID = 'com.atproto.server.defs';

    public string $usedBy;
    public string $usedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
