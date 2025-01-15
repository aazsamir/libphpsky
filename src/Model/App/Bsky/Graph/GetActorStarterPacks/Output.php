<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getActorStarterPacks';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic> */
    public array $starterPacks = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic> $starterPacks
     */
    public static function new(array $starterPacks, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->starterPacks = $starterPacks;
        $instance->cursor = $cursor;

        return $instance;
    }
}