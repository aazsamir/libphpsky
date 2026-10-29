<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * Push notification preferences by moderation notification category. These preferences do not hide in-app inbox activity. Each category defaults to enabled.
 * object
 */
class NotificationPreferences implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notificationPreferences';
    public const ID = 'tools.ozone.inbox.defs';

    /** @var bool Notify about outcomes of reports filed by the account (reportResolved and reportReopened). */
    public bool $reports;

    /** @var bool Notify about moderation actions against the account or its content, action reversals, appeal outcomes, and standing changes. Label application and removal are controlled by labels. */
    public bool $account;

    /** @var bool Notify when labels are applied to or removed from the account or its content (labelApplied and labelRemoved actions). */
    public bool $labels;

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
        return ['reports', 'account', 'labels'];
    }

    public static function new(bool $reports, bool $account, bool $labels): self
    {
        $instance = new self();
        $instance->reports = $reports;
        $instance->account = $account;
        $instance->labels = $labels;

        return $instance;
    }
}
