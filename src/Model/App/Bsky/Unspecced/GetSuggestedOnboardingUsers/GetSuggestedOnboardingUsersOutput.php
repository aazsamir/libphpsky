<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedOnboardingUsers;

/**
 * object
 */
class GetSuggestedOnboardingUsersOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestedOnboardingUsers';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $actors = [];

    /**
     * @var ?string DEPRECATED: use recIdStr instead.
     * @deprecated use recidstr instead
     */
    public ?string $recId;

    /** @var ?string Snowflake for this recommendation, use when submitting recommendation events. */
    public ?string $recIdStr;

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
    public static function new(array $actors, ?string $recId = null, ?string $recIdStr = null): self
    {
        $instance = new self();
        $instance->actors = $actors;
        if ($recId !== null) {
            $instance->recId = $recId;
        }
        if ($recIdStr !== null) {
            $instance->recIdStr = $recIdStr;
        }

        return $instance;
    }
}
