<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTag implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventTag';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var array<string> */
    public array $add = [];

    /** @var array<string> */
    public array $remove = [];
    public ?string $comment;

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
        return ['add', 'remove'];
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
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
