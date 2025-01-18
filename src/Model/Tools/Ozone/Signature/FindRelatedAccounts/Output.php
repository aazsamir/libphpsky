<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\RelatedAccount> */
    public array $accounts = [];

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
        return ['accounts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\RelatedAccount> $accounts
     */
    public static function new(array $accounts, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->accounts = $accounts;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
