<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\ListBlobs;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listBlobs';

    public ?string $cursor = null;

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
