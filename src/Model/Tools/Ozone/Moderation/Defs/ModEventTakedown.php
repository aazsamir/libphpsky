<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTakedown implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public ?int $durationInHours;
    public ?bool $acknowledgeAccountSubjects;

    /** @var array<string>|null */
    public ?array $policies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $policies
     */
    public static function new(
        ?string $comment = null,
        ?int $durationInHours = null,
        ?bool $acknowledgeAccountSubjects = null,
        ?array $policies = [],
    ): self {
        $instance = new self();
        $instance->comment = $comment;
        $instance->durationInHours = $durationInHours;
        $instance->acknowledgeAccountSubjects = $acknowledgeAccountSubjects;
        $instance->policies = $policies;

        return $instance;
    }
}
