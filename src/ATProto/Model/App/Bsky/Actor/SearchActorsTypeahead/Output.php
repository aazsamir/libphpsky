<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\SearchActorsTypeahead;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.actor.searchActorsTypeahead';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic[] */
    public array $actors = [];

    public static function id(): string
    {
        return self::ID;
    }
}
