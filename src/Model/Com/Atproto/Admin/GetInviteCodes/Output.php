<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetInviteCodes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.getInviteCodes';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode> */
    public array $codes = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode> $codes
     */
    public static function new(array $codes, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->codes = $codes;
        $instance->cursor = $cursor;

        return $instance;
    }
}