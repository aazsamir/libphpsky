<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * The state of the viewer's appeal against the actions on a subject.
 * object
 */
class AppealView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'appealView';
    public const ID = 'tools.ozone.inbox.defs';

    public string $state;
    public ?\DateTimeInterface $appealedAt;

    /** @var ?\DateTimeInterface When the appeal's report was closed. */
    public ?\DateTimeInterface $resolvedAt;

    /** @var ?string Decision on a resolved appeal. */
    public ?string $outcome;
    public ?\DateTimeInterface $appealableUntil;

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

    public static function new(
        string $state,
        ?\DateTimeInterface $appealedAt = null,
        ?\DateTimeInterface $resolvedAt = null,
        ?string $outcome = null,
        ?\DateTimeInterface $appealableUntil = null,
    ): self {
        $instance = new self();
        $instance->state = $state;
        if ($appealedAt !== null) {
            $instance->appealedAt = $appealedAt;
        }
        if ($resolvedAt !== null) {
            $instance->resolvedAt = $resolvedAt;
        }
        if ($outcome !== null) {
            $instance->outcome = $outcome;
        }
        if ($appealableUntil !== null) {
            $instance->appealableUntil = $appealableUntil;
        }

        return $instance;
    }
}
