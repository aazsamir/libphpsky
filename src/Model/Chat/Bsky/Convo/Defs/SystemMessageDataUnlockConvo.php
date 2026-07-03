<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * System message indicating the group convo was unlocked.
 * object
 */
class SystemMessageDataUnlockConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataUnlockConvo';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who unlocked the group. */
    public ?SystemMessageReferredUser $unlockedBy;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['unlockedBy'];
    }

    public static function new(?SystemMessageReferredUser $unlockedBy = null): self
    {
        $instance = new self();
        if ($unlockedBy !== null) {
            $instance->unlockedBy = $unlockedBy;
        }

        return $instance;
    }
}
