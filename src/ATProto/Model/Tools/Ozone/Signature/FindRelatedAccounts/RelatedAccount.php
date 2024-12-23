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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\Defs\SigDetail[] */
    public ?array $similarities = [];

    public static function id(): string
    {
        return self::ID;
    }
}
