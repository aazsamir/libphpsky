<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateJoinLink;

/**
 * object
 */
class CreateJoinLinkInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.group.createJoinLink';

    public string $convoId;
    public ?bool $requireApproval;
    public string $joinRule;

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
        return ['convoId', 'joinRule'];
    }

    public static function new(string $convoId, string $joinRule, ?bool $requireApproval = null): self
    {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->joinRule = $joinRule;
        if ($requireApproval !== null) {
            $instance->requireApproval = $requireApproval;
        }

        return $instance;
    }
}
