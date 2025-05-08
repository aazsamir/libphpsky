<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedStarterPacks;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestedStarterPacks';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackView> */
    public array $starterPacks = [];

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
        return ['starterPacks'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackView> $starterPacks
     */
    public static function new(array $starterPacks): self
    {
        $instance = new self();
        $instance->starterPacks = $starterPacks;

        return $instance;
    }
}
