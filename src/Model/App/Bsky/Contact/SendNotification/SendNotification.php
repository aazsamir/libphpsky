<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\SendNotification;

/**
 * System endpoint to send notifications related to contact imports. Requires role authentication.
 * procedure
 */
class SendNotification implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.contact.sendNotification';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(SendNotificationInput $input): SendNotificationOutput
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Contact\SendNotification\SendNotificationOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
