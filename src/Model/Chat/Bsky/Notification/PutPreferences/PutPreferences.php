<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Notification\PutPreferences;

/**
 * Set the requesting account's chat notification preferences. Only the provided preferences are updated; omitted preferences are left unchanged.
 * procedure
 */
class PutPreferences implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.notification.putPreferences';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(PutPreferencesInput $input): PutPreferencesOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Notification\PutPreferences\PutPreferencesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
