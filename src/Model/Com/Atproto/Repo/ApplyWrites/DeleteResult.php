<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class DeleteResult implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'deleteResult';
    public const ID = 'com.atproto.repo.applyWrites';

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
