<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerViewDetailed implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelerViewDetailed';
    public const ID = 'app.bsky.labeler.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null;
    public ?LabelerPolicies $policies = null;
    public ?int $likeCount = null;
    public ?LabelerViewerState $viewer = null;
    public string $indexedAt;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }
}
