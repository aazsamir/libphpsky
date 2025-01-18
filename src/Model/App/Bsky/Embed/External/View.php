<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.external';

    public ?ViewExternal $external;

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
        return ['external'];
    }

    public static function new(?ViewExternal $external = null): self
    {
        $instance = new self();
        if ($external !== null) {
            $instance->external = $external;
        }

        return $instance;
    }
}
