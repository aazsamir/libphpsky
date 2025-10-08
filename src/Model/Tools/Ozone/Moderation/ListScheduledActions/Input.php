<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ListScheduledActions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.listScheduledActions';

    /** @var ?\DateTimeInterface Filter actions scheduled to execute after this time */
    public ?\DateTimeInterface $startsAfter;

    /** @var ?\DateTimeInterface Filter actions scheduled to execute before this time */
    public ?\DateTimeInterface $endsBefore;

    /** @var ?array<string> Filter actions for specific DID subjects */
    public ?array $subjects = [];

    /** @var array<string> Filter actions by status */
    public array $statuses = [];

    /** @var ?int Maximum number of results to return */
    public ?int $limit;

    /** @var ?string Cursor for pagination */
    public ?string $cursor;

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
        return ['statuses'];
    }

    /**
     * @param array<string> $statuses
     * @param array<string> $subjects
     */
    public static function new(
        array $statuses,
        ?\DateTimeInterface $startsAfter = null,
        ?\DateTimeInterface $endsBefore = null,
        ?array $subjects = [],
        ?int $limit = null,
        ?string $cursor = null,
    ): self {
        $instance = new self();
        $instance->statuses = $statuses;
        if ($startsAfter !== null) {
            $instance->startsAfter = $startsAfter;
        }
        if ($endsBefore !== null) {
            $instance->endsBefore = $endsBefore;
        }
        if ($subjects !== null) {
            $instance->subjects = $subjects;
        }
        if ($limit !== null) {
            $instance->limit = $limit;
        }
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
