<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listBlobs';

    public ?string $cursor;

    /** @var array<string> */
    public array $cids = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $cids
     */
    public static function new(array $cids, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->cids = $cids;
        $instance->cursor = $cursor;

        return $instance;
    }
}
