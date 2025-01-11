<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\ListConvos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.listConvos';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\ConvoView> */
    public array $convos = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\ConvoView> $convos
     */
    public static function new(array $convos, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->convos = $convos;
        $instance->cursor = $cursor;

        return $instance;
    }
}
