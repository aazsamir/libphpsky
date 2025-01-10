<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\GetServices;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.labeler.getServices';

    /** @var mixed[] */
    public array $views = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $views
     */
    public static function new(array $views): self
    {
        $instance = new self();
        $instance->views = $views;

        return $instance;
    }
}
