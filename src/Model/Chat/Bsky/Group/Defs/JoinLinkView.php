<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * object
 */
class JoinLinkView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'joinLinkView';
    public const ID = 'chat.bsky.group.defs';

    public string $code;
    public ?string $enabledStatus;
    public bool $requireApproval;
    public string $joinRule;
    public \DateTimeInterface $createdAt;

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
        return ['code', 'enabledStatus', 'requireApproval', 'joinRule', 'createdAt'];
    }

    public static function new(
        string $code,
        bool $requireApproval,
        string $joinRule,
        \DateTimeInterface $createdAt,
        ?string $enabledStatus = null,
    ): self {
        $instance = new self();
        $instance->code = $code;
        $instance->requireApproval = $requireApproval;
        $instance->joinRule = $joinRule;
        $instance->createdAt = $createdAt;
        if ($enabledStatus !== null) {
            $instance->enabledStatus = $enabledStatus;
        }

        return $instance;
    }
}
