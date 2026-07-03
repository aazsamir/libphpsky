<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Notification\GetPreferences;

/**
 * Get the requesting account's chat notification preferences. Defaults are returned for accounts that have not set any preferences. Requires auth.
 * query
 */
class GetPreferences implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.notification.getPreferences';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): GetPreferencesOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Notification\GetPreferences\GetPreferencesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
