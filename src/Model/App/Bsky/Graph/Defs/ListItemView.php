<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListItemView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'listItemView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $subject;

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
        return ['uri', 'subject'];
    }

    public static function new(
        string $uri,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $subject = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        if ($subject !== null) {
            $instance->subject = $subject;
        }

        return $instance;
    }
}
