<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetKnownFollowers;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getKnownFollowers';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $subject = null;
    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView[] */
    public array $followers = [];

    public static function id(): string
    {
        return self::ID;
    }
}
