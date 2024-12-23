<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventView';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;
    public mixed $event;
    public mixed $subject;

    /** @var string[] */
    public array $subjectBlobCids = [];
    public string $createdBy;
    public string $createdAt;
    public ?string $creatorHandle = null;
    public ?string $subjectHandle = null;

    public static function id(): string
    {
        return self::ID;
    }
}
