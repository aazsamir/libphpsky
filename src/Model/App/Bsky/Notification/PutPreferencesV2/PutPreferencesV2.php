<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferencesV2;

/**
 * Set notification-related preferences for an account. Requires auth.
 * procedure
 */
class PutPreferencesV2 implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.putPreferencesV2';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferencesV2\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
