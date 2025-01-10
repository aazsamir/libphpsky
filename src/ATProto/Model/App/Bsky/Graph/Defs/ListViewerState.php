<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListViewerState implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'listViewerState';
    public const ID = 'app.bsky.graph.defs';

    public ?bool $muted = null;
    public ?string $blocked = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?bool $muted = null, ?string $blocked = null): self
    {
        $instance = new self();
        $instance->muted = $muted;
        $instance->blocked = $blocked;

        return $instance;
    }
}
