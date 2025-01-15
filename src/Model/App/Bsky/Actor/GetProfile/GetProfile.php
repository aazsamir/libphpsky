<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\GetProfile;

/**
 * Get detailed profile view of an actor. Does not require auth, but contains relevant metadata with auth.
 * query
 */
class GetProfile implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.getProfile';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor): \Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
