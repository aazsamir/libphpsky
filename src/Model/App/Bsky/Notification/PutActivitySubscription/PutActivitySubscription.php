<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutActivitySubscription;

/**
 * Puts an activity subscription entry. The key should be omitted for creation and provided for updates. Requires auth.
 * procedure
 */
class PutActivitySubscription implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.putActivitySubscription';

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
        return \Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutActivitySubscription\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
