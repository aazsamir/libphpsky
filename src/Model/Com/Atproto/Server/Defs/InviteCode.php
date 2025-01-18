<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs;

/**
 * object
 */
class InviteCode implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'inviteCode';
    public const ID = 'com.atproto.server.defs';

    public string $code;
    public int $available;
    public bool $disabled;
    public string $forAccount;
    public string $createdBy;
    public \DateTimeInterface $createdAt;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCodeUse> */
    public array $uses = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCodeUse> $uses
     */
    public static function new(
        string $code,
        int $available,
        bool $disabled,
        string $forAccount,
        string $createdBy,
        \DateTimeInterface $createdAt,
        array $uses,
    ): self {
        $instance = new self();
        $instance->code = $code;
        $instance->available = $available;
        $instance->disabled = $disabled;
        $instance->forAccount = $forAccount;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->uses = $uses;

        return $instance;
    }
}
