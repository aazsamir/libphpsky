<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush;

/**
 * Register to receive push notifications, via a specified service, for the requesting account. Requires auth.
 * procedure
 */
class RegisterPush implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.registerPush';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
