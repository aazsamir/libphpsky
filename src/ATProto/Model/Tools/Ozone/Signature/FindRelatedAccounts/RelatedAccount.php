<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * object
 */
class RelatedAccount implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'relatedAccount';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\AccountView $account = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\Defs\SigDetail>|null */
    public ?array $similarities = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\Defs\SigDetail> $similarities
     */
    public static function new(
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\AccountView $account = null,
        ?array $similarities = null,
    ): self {
        $instance = new self();
        $instance->account = $account;
        $instance->similarities = $similarities;

        return $instance;
    }
}
