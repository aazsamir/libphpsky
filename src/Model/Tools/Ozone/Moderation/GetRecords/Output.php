<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getRecords';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordViewNotFound> */
    public array $records = [];

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
        return ['records'];
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
