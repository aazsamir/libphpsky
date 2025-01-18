<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Service;

/**
 * object
 */
class Service implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.labeler.service';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels;
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
        return ['policies', 'createdAt'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        if ($policies !== null) {
            $instance->policies = $policies;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
