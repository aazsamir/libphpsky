<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetMutes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getMutes';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $mutes = [];

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
        return ['mutes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $mutes
     */
    public static function new(array $mutes, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->mutes = $mutes;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
