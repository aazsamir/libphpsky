<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * System message indicating the group convo was locked.
 * object
 */
class SystemMessageDataLockConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataLockConvo';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who locked the group. */
    public ?SystemMessageReferredUser $lockedBy;

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
        return ['lockedBy'];
    }

    public static function new(?SystemMessageReferredUser $lockedBy = null): self
    {
        $instance = new self();
        if ($lockedBy !== null) {
            $instance->lockedBy = $lockedBy;
        }

        return $instance;
    }
}
