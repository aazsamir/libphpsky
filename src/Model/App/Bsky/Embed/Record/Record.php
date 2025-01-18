<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class Record implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.record';

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $record;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $record = null): self
    {
        $instance = new self();
        $instance->record = $record;

        return $instance;
    }
}
