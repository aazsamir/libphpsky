<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class UpdateResult implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'updateResult';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $uri;
    public string $cid;
    public ?string $validationStatus = null;

    public static function id(): string
    {
        return self::ID;
    }
}
