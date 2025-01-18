<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelerViewerState';
    public const ID = 'app.bsky.labeler.defs';

    public ?string $like = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $like = null): self
    {
        $instance = new self();
        $instance->like = $like;

        return $instance;
    }
}
