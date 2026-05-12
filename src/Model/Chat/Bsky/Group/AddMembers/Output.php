<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\AddMembers;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.addMembers';

    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> */
    public ?array $addedMembers = [];

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
        return ['convo'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> $addedMembers
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null,
        ?array $addedMembers = [],
    ): self {
        $instance = new self();
        if ($convo !== null) {
            $instance->convo = $convo;
        }
        if ($addedMembers !== null) {
            $instance->addedMembers = $addedMembers;
        }

        return $instance;
    }
}
