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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\ConvoView[] */
    public array $convos = [];

    public static function id(): string
    {
        return self::ID;
    }
}
