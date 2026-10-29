<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * The current enforcement state of a subject.
 * object
 */
class EnforcementView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'enforcementView';
    public const ID = 'tools.ozone.inbox.defs';

    public string $state;
    public ?string $scope;
    public ?\DateTimeInterface $expiresAt;

    /** @var ?array<string> Active label values on the subject, excluding negated and expired labels. */
    public ?array $labels = [];

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
        return ['state'];
    }

    /**
     * @param array<string> $labels
     */
    public static function new(
        string $state,
        ?string $scope = null,
        ?\DateTimeInterface $expiresAt = null,
        ?array $labels = [],
    ): self {
        $instance = new self();
        $instance->state = $state;
        if ($scope !== null) {
            $instance->scope = $scope;
        }
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
