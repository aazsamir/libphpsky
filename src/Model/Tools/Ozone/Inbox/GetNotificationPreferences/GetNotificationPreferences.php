<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetNotificationPreferences;

/**
 * Get moderation push notification preferences for report outcomes, account actions, and labeling. Returns all three categories, defaulting to enabled for an account without saved preferences.
 * query
 */
class GetNotificationPreferences implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.getNotificationPreferences';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     */
    public function query(?string $did = null): GetNotificationPreferencesOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetNotificationPreferences\GetNotificationPreferencesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $did Account to preview. Only Ozone staff can read another account; this does not change its read state.
     * @return array<string, mixed>
     */
    public function rawQuery(?string $did = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
