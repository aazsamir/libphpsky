<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.disableInviteCodes';

    /** @var array<string>|null */
    public ?array $codes = [];

    /** @var array<string>|null */
    public ?array $accounts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $codes
     * @param array<string> $accounts
     */
    public static function new(?array $codes = [], ?array $accounts = []): self
    {
        $instance = new self();
        $instance->codes = $codes;
        $instance->accounts = $accounts;

        return $instance;
    }
}
