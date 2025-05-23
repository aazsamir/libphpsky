<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsers;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestedUsers';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $actors = [];

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
        return ['actors'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $actors
     */
    public static function new(array $actors): self
    {
        $instance = new self();
        $instance->actors = $actors;

        return $instance;
    }
}
