<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileAssociatedGerm implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileAssociatedGerm';
    public const ID = 'app.bsky.actor.defs';

    public string $messageMeUrl;
    public string $showButtonTo;

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
        return ['showButtonTo', 'messageMeUrl'];
    }

    public static function new(string $messageMeUrl, string $showButtonTo): self
    {
        $instance = new self();
        $instance->messageMeUrl = $messageMeUrl;
        $instance->showButtonTo = $showButtonTo;

        return $instance;
    }
}
