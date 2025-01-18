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

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs\SigDetail> $similarities
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView $account = null,
        ?array $similarities = [],
    ): self {
        $instance = new self();
        if ($account !== null) {
            $instance->account = $account;
        }
        if ($similarities !== null) {
            $instance->similarities = $similarities;
        }

        return $instance;
    }
}
