<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableAccountInvites;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.disableAccountInvites';

    public string $account;

    /** @var ?string Optional reason for disabled invites. */
    public ?string $note;

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
        return ['account'];
    }

    public static function new(string $account, ?string $note = null): self
    {
        $instance = new self();
        $instance->account = $account;
        if ($note !== null) {
            $instance->note = $note;
        }

        return $instance;
    }
}
