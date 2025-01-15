<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTag implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'modEventTag';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var array<string> */
    public array $add = [];

    /** @var array<string> */
    public array $remove = [];
    public ?string $comment = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $add
     * @param array<string> $remove
     */
    public static function new(array $add, array $remove, ?string $comment = null): self
    {
        $instance = new self();
        $instance->add = $add;
        $instance->remove = $remove;
        $instance->comment = $comment;

        return $instance;
    }
}
