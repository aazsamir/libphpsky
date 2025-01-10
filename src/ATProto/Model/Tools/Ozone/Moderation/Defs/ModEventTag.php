<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTag implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventTag';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string[] */
    public array $add = [];

    /** @var string[] */
    public array $remove = [];
    public ?string $comment = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $add
     * @param string[] $remove
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
