<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * object
 */
class RelatedAccount implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'relatedAccount';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView $account;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail>|null */
    public ?array $similarities = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail> $similarities
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView $account = null,
        ?array $similarities = null,
    ): self {
        $instance = new self();
        $instance->account = $account;
        $instance->similarities = $similarities;

        return $instance;
    }
}
