<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class LogUnmuteConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logUnmuteConvo';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

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
        return ['rev', 'convoId'];
    }

    public static function new(string $rev, string $convoId): self
    {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;

        return $instance;
    }
}
