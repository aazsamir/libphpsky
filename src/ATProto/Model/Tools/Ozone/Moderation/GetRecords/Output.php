<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRecords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getRecords';

    /** @var mixed[] */
    public array $records = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $records
     */
    public static function new(array $records): self
    {
        $instance = new self();
        $instance->records = $records;

        return $instance;
    }
}
