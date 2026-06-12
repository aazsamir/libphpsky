<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Embed\JoinLink;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'view';
    public const ID = 'chat.bsky.embed.joinLink';

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\DisabledJoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\InvalidJoinLinkPreviewView */
    public mixed $joinLinkPreview;

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
        return ['joinLinkPreview'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\DisabledJoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\InvalidJoinLinkPreviewView $joinLinkPreview,
    ): self {
        $instance = new self();
        $instance->joinLinkPreview = $joinLinkPreview;

        return $instance;
    }
}
