<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. System message indicating the group info was edited.
 * object
 */
class SystemMessageDataEditGroup implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataEditGroup';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?string Group name that was replaced. */
    public ?string $oldName;

    /** @var ?string Group name that replaced the old. */
    public ?string $newName;

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
        return [];
    }

    public static function new(?string $oldName = null, ?string $newName = null): self
    {
        $instance = new self();
        if ($oldName !== null) {
            $instance->oldName = $oldName;
        }
        if ($newName !== null) {
            $instance->newName = $newName;
        }

        return $instance;
    }
}
