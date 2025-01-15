<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getRecords';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewNotFound> */
    public array $records = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewNotFound> $records
     */
    public static function new(array $records): self
    {
        $instance = new self();
        $instance->records = $records;

        return $instance;
    }
}
