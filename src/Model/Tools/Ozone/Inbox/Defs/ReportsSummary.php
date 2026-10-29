<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * Aggregate view of reports filed against this subject. Deliberately carries no report IDs, no count, and no reporter identities.
 * object
 */
class ReportsSummary implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportsSummary';
    public const ID = 'tools.ozone.inbox.defs';

    /** @var array<string> Distinct reason types reported, deduplicated and unordered. Excludes reasonAppeal. */
    public array $reasonTypes = [];

    /** @var \DateTimeInterface Day of the earliest report, truncated to midnight UTC. Render as a date; the time component is not meaningful. */
    public \DateTimeInterface $firstReportedOn;

    /** @var \DateTimeInterface Day of the most recent report, truncated to midnight UTC. Render as a date; the time component is not meaningful. */
    public \DateTimeInterface $lastReportedOn;

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
        return ['reasonTypes', 'firstReportedOn', 'lastReportedOn'];
    }

    /**
     * @param array<string> $reasonTypes
     */
    public static function new(
        array $reasonTypes,
        \DateTimeInterface $firstReportedOn,
        \DateTimeInterface $lastReportedOn,
    ): self {
        $instance = new self();
        $instance->reasonTypes = $reasonTypes;
        $instance->firstReportedOn = $firstReportedOn;
        $instance->lastReportedOn = $lastReportedOn;

        return $instance;
    }
}
