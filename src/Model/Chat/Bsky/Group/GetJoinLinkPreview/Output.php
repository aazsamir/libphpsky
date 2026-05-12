<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreview;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.getJoinLinkPreview';

    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView $joinLinkPreview;

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
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView $joinLinkPreview = null,
    ): self {
        $instance = new self();
        if ($joinLinkPreview !== null) {
            $instance->joinLinkPreview = $joinLinkPreview;
        }

        return $instance;
    }
}
