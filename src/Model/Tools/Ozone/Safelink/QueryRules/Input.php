<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryRules;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.safelink.queryRules';

    /** @var ?string Cursor for pagination */
    public ?string $cursor;

    /** @var ?int Maximum number of results to return */
    public ?int $limit;

    /** @var ?array<string> Filter by specific URLs or domains */
    public ?array $urls = [];

    /** @var ?string Filter by pattern type */
    public ?string $patternType;

    /** @var ?array<string> Filter by action types */
    public ?array $actions = [];

    /** @var ?string Filter by reason type */
    public ?string $reason;

    /** @var ?string Filter by rule creator */
    public ?string $createdBy;

    /** @var ?string Sort direction */
    public ?string $sortDirection;

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
        return [];
    }

    /**
     * @param array<string> $urls
     * @param array<string> $actions
     */
    public static function new(
        ?string $cursor = null,
        ?int $limit = null,
        ?array $urls = [],
        ?string $patternType = null,
        ?array $actions = [],
        ?string $reason = null,
        ?string $createdBy = null,
        ?string $sortDirection = null,
    ): self {
        $instance = new self();
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($limit !== null) {
            $instance->limit = $limit;
        }
        if ($urls !== null) {
            $instance->urls = $urls;
        }
        if ($patternType !== null) {
            $instance->patternType = $patternType;
        }
        if ($actions !== null) {
            $instance->actions = $actions;
        }
        if ($reason !== null) {
            $instance->reason = $reason;
        }
        if ($createdBy !== null) {
            $instance->createdBy = $createdBy;
        }
        if ($sortDirection !== null) {
            $instance->sortDirection = $sortDirection;
        }

        return $instance;
    }
}
