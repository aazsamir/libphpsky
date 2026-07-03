<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsersSkeleton;

/**
 * object
 */
class GetSuggestedUsersSkeletonOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestedUsersSkeleton';

    /** @var array<string> */
    public array $dids = [];

    /** @var ?string DEPRECATED: use recIdStr instead. */
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
        return ['dids'];
    }

    /**
     * @param array<string> $dids
     */
    public static function new(array $dids, ?string $recId = null, ?string $recIdStr = null): self
    {
        $instance = new self();
        $instance->dids = $dids;
        if ($recId !== null) {
            $instance->recId = $recId;
        }
        if ($recIdStr !== null) {
            $instance->recIdStr = $recIdStr;
        }

        return $instance;
    }
}
