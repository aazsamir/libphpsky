<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences;

/**
 * Get private preferences attached to the current account. Expected use is synchronization between multiple devices, and import/export during account migration. Requires auth.
 * query
 */
class GetPreferences implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.getPreferences';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetPreferences\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
