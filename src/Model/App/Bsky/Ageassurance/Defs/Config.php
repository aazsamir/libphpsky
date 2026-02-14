<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * object
 */
class Config implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'config';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegion> The per-region Age Assurance configuration. */
    public array $regions = [];

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
        return ['regions'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\ConfigRegion> $regions
     */
    public static function new(array $regions): self
    {
        $instance = new self();
        $instance->regions = $regions;

        return $instance;
    }
}
