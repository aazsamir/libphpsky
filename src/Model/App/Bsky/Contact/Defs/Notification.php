<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\Defs;

/**
 * A stash object to be sent via bsync representing a notification to be created.
 * object
 */
class Notification implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notification';
    public const ID = 'app.bsky.contact.defs';

    /** @var string The DID of who this notification comes from. */
    public string $from;

    /** @var string The DID of who this notification should go to. */
    public string $to;

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
        return ['from', 'to'];
    }

    public static function new(string $from, string $to): self
    {
        $instance = new self();
        $instance->from = $from;
        $instance->to = $to;

        return $instance;
    }
}
