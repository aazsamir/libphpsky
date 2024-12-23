<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPacks;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getStarterPacks';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\StarterPackViewBasic[] */
    public array $starterPacks = [];

    public static function id(): string
    {
        return self::ID;
    }
}
