<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RequestJoin;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.requestJoin';

    public string $status;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView The group convo joined. This is only present in the case of status=joined */
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo;

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
        return ['status'];
    }

    public static function new(
        string $status,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        if ($convo !== null) {
            $instance->convo = $convo;
        }

        return $instance;
    }
}
