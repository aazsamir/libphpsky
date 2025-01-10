<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\DisableAccountInvites;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.disableAccountInvites';

    public string $account;
    public ?string $note = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $account, ?string $note = null): self
    {
        $instance = new self();
        $instance->account = $account;
        $instance->note = $note;

        return $instance;
    }
}
