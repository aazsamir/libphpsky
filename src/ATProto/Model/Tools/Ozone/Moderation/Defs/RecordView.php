<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'recordView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $uri;
    public string $cid;
    public mixed $value;

    /** @var string[] */
    public array $blobCids = [];
    public string $indexedAt;
    public Moderation $moderation;
    public ?RepoView $repo = null;

    public static function id(): string
    {
        return self::ID;
    }
}
