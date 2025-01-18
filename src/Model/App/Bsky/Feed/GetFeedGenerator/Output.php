<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getFeedGenerator';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView $view = null;
    public bool $isOnline;
    public bool $isValid;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        bool $isOnline,
        bool $isValid,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView $view = null,
    ): self {
        $instance = new self();
        $instance->isOnline = $isOnline;
        $instance->isValid = $isValid;
        $instance->view = $view;

        return $instance;
    }
}
