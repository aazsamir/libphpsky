<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.listRecords';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\Record> */
    public array $records = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\Record> $records
     */
    public static function new(array $records, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->records = $records;
        $instance->cursor = $cursor;

        return $instance;
    }
}
