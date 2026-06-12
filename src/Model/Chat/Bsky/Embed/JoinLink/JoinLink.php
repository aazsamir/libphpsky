<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Embed\JoinLink;

/**
 * object
 */
class JoinLink implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'chat.bsky.embed.joinLink';

    /** @var string The join link code. */
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
