<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class InterestsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'interestsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<string> A list of tags which describe the account owner's interests gathered during onboarding. */
    public array $tags = [];

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
        return ['tags'];
    }

    /**
     * @param array<string> $tags
     */
    public static function new(array $tags): self
    {
        $instance = new self();
        $instance->tags = $tags;

        return $instance;
    }
}
