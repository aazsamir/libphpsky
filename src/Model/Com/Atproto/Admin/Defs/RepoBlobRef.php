<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class RepoBlobRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repoBlobRef';
    public const ID = 'com.atproto.admin.defs';

    public string $did;
    public string $cid;
    public ?string $recordUri = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, string $cid, ?string $recordUri = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->cid = $cid;
        $instance->recordUri = $recordUri;

        return $instance;
    }
}
