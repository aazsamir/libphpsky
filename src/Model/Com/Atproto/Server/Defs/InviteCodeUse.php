<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs;

/**
 * object
 */
class InviteCodeUse implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'inviteCodeUse';
    public const ID = 'com.atproto.server.defs';

    public string $usedBy;
    public \DateTimeInterface $usedAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $usedBy, \DateTimeInterface $usedAt): self
    {
        $instance = new self();
        $instance->usedBy = $usedBy;
        $instance->usedAt = $usedAt;

        return $instance;
    }
}
