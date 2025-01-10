<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.record';

    public mixed $record;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(mixed $record): self
    {
        $instance = new self();
        $instance->record = $record;

        return $instance;
    }
}
