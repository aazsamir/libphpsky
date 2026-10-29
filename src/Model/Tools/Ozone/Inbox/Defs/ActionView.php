<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * A single moderation action taken against a subject.
 * object
 */
class ActionView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'actionView';
    public const ID = 'tools.ozone.inbox.defs';

    /** @var int Action ID (moderation event ID). */
    public int $id;

    /** @var string Public action type. */
    public string $type;
    public ?string $scope;
    public \DateTimeInterface $createdAt;
    public ?\DateTimeInterface $reversedAt;
    public ?\DateTimeInterface $expiresAt;

    /** @var ?array<string> Label values, for labelApplied/labelRemoved. */
    public ?array $labels = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\PolicyView> Policies applied by a takedown action. */
    public ?array $policies = [];

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
        return ['id', 'type', 'createdAt'];
    }

    /**
     * @param array<string> $labels
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\PolicyView> $policies
     */
    public static function new(
        int $id,
        string $type,
        \DateTimeInterface $createdAt,
        ?string $scope = null,
        ?\DateTimeInterface $reversedAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?array $labels = [],
        ?array $policies = [],
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->type = $type;
        $instance->createdAt = $createdAt;
        if ($scope !== null) {
            $instance->scope = $scope;
        }
        if ($reversedAt !== null) {
            $instance->reversedAt = $reversedAt;
        }
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($policies !== null) {
            $instance->policies = $policies;
        }

        return $instance;
    }
}
