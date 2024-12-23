<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class LabelersPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelersPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\LabelerPrefItem[] */
    public array $labelers = [];

    public static function id(): string
    {
        return self::ID;
    }
}
