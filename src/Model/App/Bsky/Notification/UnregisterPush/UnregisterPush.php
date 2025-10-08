<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\UnregisterPush;

/**
 * The inverse of registerPush - inform a specified service that push notifications should no longer be sent to the given token for the requesting account. Requires auth.
 * procedure
 */
class UnregisterPush implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.unregisterPush';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
