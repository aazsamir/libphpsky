<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.createInviteCodes';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\AccountCodes> */
    public array $codes = [];

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['codes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCodes\AccountCodes> $codes
     */
    public static function new(array $codes): self
    {
        $instance = new self();
        $instance->codes = $codes;

        return $instance;
    }
}
