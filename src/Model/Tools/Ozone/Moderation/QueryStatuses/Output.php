<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.queryStatuses';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView> */
    public array $subjectStatuses = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView> $subjectStatuses
     */
    public static function new(array $subjectStatuses, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->subjectStatuses = $subjectStatuses;
        $instance->cursor = $cursor;

        return $instance;
    }
}
