<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\UploadBlob;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.uploadBlob';

    public string $blob;

    public static function id(): string
    {
        return self::ID;
    }
}
