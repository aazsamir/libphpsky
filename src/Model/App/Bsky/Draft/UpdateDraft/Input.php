<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\UpdateDraft;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.draft.updateDraft';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftWithId $draft;

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
        return ['draft'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftWithId $draft = null): self
    {
        $instance = new self();
        if ($draft !== null) {
            $instance->draft = $draft;
        }

        return $instance;
    }
}
