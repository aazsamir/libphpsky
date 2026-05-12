<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\EnableJoinLink;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.enableJoinLink';

    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink;

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
        return ['joinLink'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink = null): self
    {
        $instance = new self();
        if ($joinLink !== null) {
            $instance->joinLink = $joinLink;
        }

        return $instance;
    }
}
