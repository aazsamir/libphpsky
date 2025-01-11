<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTakedown implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?int $durationInHours = null;
    public ?bool $acknowledgeAccountSubjects = null;

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
        ?array $policies = null,
    ): self {
        $instance = new self();
        $instance->comment = $comment;
        $instance->durationInHours = $durationInHours;
        $instance->acknowledgeAccountSubjects = $acknowledgeAccountSubjects;
        $instance->policies = $policies;

        return $instance;
    }
}
