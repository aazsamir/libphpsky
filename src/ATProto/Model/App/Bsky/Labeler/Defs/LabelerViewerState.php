<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerViewerState implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
