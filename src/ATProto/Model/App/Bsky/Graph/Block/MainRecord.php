<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Block;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.graph.block';

    public string $subject;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
