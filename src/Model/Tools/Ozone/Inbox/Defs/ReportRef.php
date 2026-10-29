<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * Reference to a report by its report table ID, as used by getReport and Ozone's report detail page.
 * object
 */
class ReportRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportRef';
    public const ID = 'tools.ozone.inbox.defs';

    public int $reportId;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|null */
    public mixed $subject;
    public ?string $status;

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
        return ['reportId'];
    }

    public static function new(
        int $reportId,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|null $subject = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->reportId = $reportId;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
