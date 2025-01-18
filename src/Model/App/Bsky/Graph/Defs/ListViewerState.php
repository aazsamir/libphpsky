<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'listViewerState';
    public const ID = 'app.bsky.graph.defs';

    public ?bool $muted;
    public ?string $blocked;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return [];
    }

    public static function new(?bool $muted = null, ?string $blocked = null): self
    {
        $instance = new self();
        if ($muted !== null) {
            $instance->muted = $muted;
        }
        if ($blocked !== null) {
            $instance->blocked = $blocked;
        }

        return $instance;
    }
}
