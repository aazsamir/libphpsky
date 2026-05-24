<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * object
 */
class JoinLinkViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'joinLinkViewerState';
    public const ID = 'chat.bsky.group.defs';

    public ?\DateTimeInterface $requestedAt;

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
        return [];
    }

    public static function new(?\DateTimeInterface $requestedAt = null): self
    {
        $instance = new self();
        if ($requestedAt !== null) {
            $instance->requestedAt = $requestedAt;
        }

        return $instance;
    }
}
