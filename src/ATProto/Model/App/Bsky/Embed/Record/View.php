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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\ViewRecord|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\ViewNotFound|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\ViewBlocked|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\ViewDetached|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListView|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Labeler\Defs\LabelerView|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\StarterPackViewBasic */
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
