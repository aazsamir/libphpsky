<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.scheduleAction';

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction\Takedown */
    public mixed $action;

    /** @var array<string> Array of DID subjects to schedule the action for */
    public array $subjects = [];
    public string $createdBy;
    public ?SchedulingConfig $scheduling;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModTool This will be propagated to the moderation event when it is applied */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModTool $modTool;

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
        return ['action', 'subjects', 'createdBy', 'scheduling'];
    }

    /**
     * @param array<string> $subjects
     */
    public static function new(
        Takedown $action,
        array $subjects,
        string $createdBy,
        ?SchedulingConfig $scheduling = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModTool $modTool = null,
    ): self {
        $instance = new self();
        $instance->action = $action;
        $instance->subjects = $subjects;
        $instance->createdBy = $createdBy;
        if ($scheduling !== null) {
            $instance->scheduling = $scheduling;
        }
        if ($modTool !== null) {
            $instance->modTool = $modTool;
        }

        return $instance;
    }
}
