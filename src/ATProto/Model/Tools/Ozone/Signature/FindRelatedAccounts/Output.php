<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts\RelatedAccount[] */
    public array $accounts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts\RelatedAccount[] $accounts
     */
    public static function new(array $accounts, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->accounts = $accounts;
        $instance->cursor = $cursor;

        return $instance;
    }
}
