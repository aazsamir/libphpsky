<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Moderation\CreateReport;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.moderation.createReport';

    public int $id;
    public string $reasonType;
    public ?string $reason = null;
    public mixed $subject;
    public string $reportedBy;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
