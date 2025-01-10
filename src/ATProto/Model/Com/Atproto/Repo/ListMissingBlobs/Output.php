<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListMissingBlobs;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.listMissingBlobs';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListMissingBlobs\RecordBlob[] */
    public array $blobs = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListMissingBlobs\RecordBlob[] $blobs
     */
    public static function new(array $blobs, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->blobs = $blobs;
        $instance->cursor = $cursor;

        return $instance;
    }
}
