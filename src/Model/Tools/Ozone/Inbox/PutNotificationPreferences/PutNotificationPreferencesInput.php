<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\PutNotificationPreferences;

/**
 * object
 */
class PutNotificationPreferencesInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.inbox.putNotificationPreferences';

    /** @var ?bool Notify about outcomes of reports filed by the account. */
    public ?bool $reports;

    /** @var ?bool Notify about moderation actions against the account or its content, excluding labeling. */
    public ?bool $account;

    /** @var ?bool Notify about labels applied to or removed from the account or its content. */
    public ?bool $labels;

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

    public static function new(?bool $reports = null, ?bool $account = null, ?bool $labels = null): self
    {
        $instance = new self();
        if ($reports !== null) {
            $instance->reports = $reports;
        }
        if ($account !== null) {
            $instance->account = $account;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
