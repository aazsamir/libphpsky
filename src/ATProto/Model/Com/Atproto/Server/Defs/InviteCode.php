<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs;

/**
 * object
 */
class InviteCode implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'inviteCode';
    public const ID = 'com.atproto.server.defs';

    public string $code;
    public int $available;
    public bool $disabled;
    public string $forAccount;
    public string $createdBy;
    public string $createdAt;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCodeUse[] */
    public array $uses = [];

    public static function id(): string
    {
        return self::ID;
    }
}
