<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\GetJoinLinkPreviews;

/**
 * object
 */
class GetJoinLinkPreviewsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.getJoinLinkPreviews';

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\DisabledJoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\InvalidJoinLinkPreviewView> */
    public array $joinLinkPreviews = [];

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
        return ['joinLinkPreviews'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\DisabledJoinLinkPreviewView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\InvalidJoinLinkPreviewView> $joinLinkPreviews
     */
    public static function new(array $joinLinkPreviews): self
    {
        $instance = new self();
        $instance->joinLinkPreviews = $joinLinkPreviews;

        return $instance;
    }
}
