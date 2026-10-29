<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * A subject with a page of its action history and an aggregate report summary. Follow cursor to retrieve older actions; enforcement and appeal describe the current subject state on every page.
 * object
 */
class SubjectViewDetail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectViewDetail';
    public const ID = 'tools.ozone.inbox.defs';

    public string $src;
    public bool $isRead;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;
    public mixed $record;
    public ?EnforcementView $enforcement;
    public ?AppealView $appeal;

    /** @var ?array<string> */
    public ?array $availableActions = [];

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\ActionView> A page of action history, most recent first. Reversal timestamps include changes outside this page. */
    public array $actions = [];

    /** @var ?string Cursor for the next page of action history. Omitted when no older actions remain. */
    public ?string $cursor;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\ReportsSummary Omitted when the subject has never been reported, e.g. proactive enforcement. */
    public ?ReportsSummary $reports;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

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
        return ['src', 'subject', 'enforcement', 'isRead', 'actions', 'createdAt', 'updatedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\ActionView> $actions
     * @param array<string> $availableActions
     */
    public static function new(
        string $src,
        bool $isRead,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        array $actions,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        mixed $record = null,
        ?EnforcementView $enforcement = null,
        ?AppealView $appeal = null,
        ?array $availableActions = [],
        ?string $cursor = null,
        ?ReportsSummary $reports = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->isRead = $isRead;
        $instance->subject = $subject;
        $instance->actions = $actions;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        if ($record !== null) {
            $instance->record = $record;
        }
        if ($enforcement !== null) {
            $instance->enforcement = $enforcement;
        }
        if ($appeal !== null) {
            $instance->appeal = $appeal;
        }
        if ($availableActions !== null) {
            $instance->availableActions = $availableActions;
        }
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($reports !== null) {
            $instance->reports = $reports;
        }

        return $instance;
    }
}
