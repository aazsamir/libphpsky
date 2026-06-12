<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * Preview for a disabled join link. Carries only the code so clients can correlate with the input and render a disabled state.
 * object
 */
class DisabledJoinLinkPreviewView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'disabledJoinLinkPreviewView';
    public const ID = 'chat.bsky.group.defs';

    public string $code;

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
        return ['code'];
    }

    public static function new(string $code): self
    {
        $instance = new self();
        $instance->code = $code;

        return $instance;
    }
}
