<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getMutes';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $mutes = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $mutes
     */
    public static function new(array $mutes, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->mutes = $mutes;
        $instance->cursor = $cursor;

        return $instance;
    }
}
