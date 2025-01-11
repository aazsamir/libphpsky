<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Service;

/**
 * object
 */
class Service implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.labeler.service';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels = null;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $createdAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->policies = $policies;
        $instance->labels = $labels;

        return $instance;
    }
}
