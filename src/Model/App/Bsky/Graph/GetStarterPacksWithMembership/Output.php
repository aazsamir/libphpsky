<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacksWithMembership;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getStarterPacksWithMembership';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacksWithMembership\StarterPackWithMembership> */
    public array $starterPacksWithMembership = [];

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
        return ['starterPacksWithMembership'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacksWithMembership\StarterPackWithMembership> $starterPacksWithMembership
     */
    public static function new(array $starterPacksWithMembership, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->starterPacksWithMembership = $starterPacksWithMembership;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
