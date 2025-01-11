<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryStatuses;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.queryStatuses';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView> */
    public array $subjectStatuses = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView> $subjectStatuses
     */
    public static function new(array $subjectStatuses, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->subjectStatuses = $subjectStatuses;
        $instance->cursor = $cursor;

        return $instance;
    }
}
