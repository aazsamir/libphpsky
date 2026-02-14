<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedLocalRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedLocalRef';
    public const ID = 'app.bsky.draft.defs';

    /** @var string Local, on-device ref to file to be embedded. Embeds are currently device-bound for drafts. */
    public string $path;

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
        return ['path'];
    }

    public static function new(string $path): self
    {
        $instance = new self();
        $instance->path = $path;

        return $instance;
    }
}
