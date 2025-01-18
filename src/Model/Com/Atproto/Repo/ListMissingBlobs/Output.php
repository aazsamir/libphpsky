<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.listMissingBlobs';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\RecordBlob> */
    public array $blobs = [];

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
        return ['blobs'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs\RecordBlob> $blobs
     */
    public static function new(array $blobs, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->blobs = $blobs;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
