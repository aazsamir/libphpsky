<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.getAccountInfos';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView> */
    public array $infos = [];

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
        return ['infos'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView> $infos
     */
    public static function new(array $infos): self
    {
        $instance = new self();
        $instance->infos = $infos;

        return $instance;
    }
}
