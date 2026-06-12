<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetConvos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.moderation.getConvos';

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs\ConvoView> */
    public array $convos = [];

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
        return ['convos'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs\ConvoView> $convos
     */
    public static function new(array $convos): self
    {
        $instance = new self();
        $instance->convos = $convos;

        return $instance;
    }
}
