<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\GetServices;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.labeler.getServices';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerView|\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerViewDetailed> */
    public array $views = [];

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
        return ['views'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerView|\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerViewDetailed> $views
     */
    public static function new(array $views): self
    {
        $instance = new self();
        $instance->views = $views;

        return $instance;
    }
}
