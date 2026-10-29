<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\PutNotificationPreferences;

/**
 * Update the authenticated account's moderation push notification preferences. Only provided categories are updated; omitted categories retain their values. At least one category must be provided. Returns all three preferences. These preferences do not hide in-app inbox activity.
 * procedure
 */
class PutNotificationPreferences implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.putNotificationPreferences';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(PutNotificationPreferencesInput $input): PutNotificationPreferencesOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\PutNotificationPreferences\PutNotificationPreferencesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(PutNotificationPreferencesInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
