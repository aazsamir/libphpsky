<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetMutes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getMutes';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView[] */
    public array $mutes = [];

    public static function id(): string
    {
        return self::ID;
    }
}
