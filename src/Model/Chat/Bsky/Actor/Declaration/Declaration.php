<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Declaration;

/**
 * object
 */
class Declaration implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'chat.bsky.actor.declaration';

    public string $allowIncoming;

    /** @var ?string Declaration about group chat invitation preferences for the record owner. */
    public ?string $allowGroupInvites;

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
        return ['allowIncoming'];
    }

    public static function new(string $allowIncoming, ?string $allowGroupInvites = null): self
    {
        $instance = new self();
        $instance->allowIncoming = $allowIncoming;
        if ($allowGroupInvites !== null) {
            $instance->allowGroupInvites = $allowGroupInvites;
        }

        return $instance;
    }
}
