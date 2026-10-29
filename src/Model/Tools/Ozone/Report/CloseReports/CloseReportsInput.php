<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CloseReports;

/**
 * object
 */
class CloseReportsInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.closeReports';

    /** @var string Subject DID (account-level reports) or AT-URI (record-level reports) whose reports should be closed. */
    public string $subject;

    /** @var ?bool If true, also close reports on all subjects owned by the account, including records, messages, and conversations. Only valid when subject is an account DID. */
    public ?bool $includeAllOwned;

    /** @var ?array<string> If nonempty, only reports of the given report types (fully qualified reason NSIDs) are closed. When omitted or empty, all eligible reports in the requested subject scope are targeted, except excludedReportTypes. Assigned and escalated reports are always excluded. */
    public ?array $reportTypes = [];

    /** @var ?array<string> Reports of these types (fully qualified reason NSIDs) are excluded from closure and left unchanged. When omitted or empty, no report types are excluded. */
    public ?array $excludedReportTypes = [];

    /** @var ?string Optional moderator-only note recorded on each close activity. Not visible to reporters. */
    public ?string $internalNote;

    /** @var ?bool Set true when this action is triggered by an automated process. Defaults to false. */
    public ?bool $isAutomated;
    public mixed $meta;

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
        return ['subject'];
    }

    /**
     * @param array<string> $reportTypes
     * @param array<string> $excludedReportTypes
     */
    public static function new(
        string $subject,
        ?bool $includeAllOwned = null,
        ?array $reportTypes = [],
        ?array $excludedReportTypes = [],
        ?string $internalNote = null,
        ?bool $isAutomated = null,
        mixed $meta = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        if ($includeAllOwned !== null) {
            $instance->includeAllOwned = $includeAllOwned;
        }
        if ($reportTypes !== null) {
            $instance->reportTypes = $reportTypes;
        }
        if ($excludedReportTypes !== null) {
            $instance->excludedReportTypes = $excludedReportTypes;
        }
        if ($internalNote !== null) {
            $instance->internalNote = $internalNote;
        }
        if ($isAutomated !== null) {
            $instance->isAutomated = $isAutomated;
        }
        if ($meta !== null) {
            $instance->meta = $meta;
        }

        return $instance;
    }
}
