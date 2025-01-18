<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.record';

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\ViewRecord|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\ViewNotFound|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\ViewBlocked|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\ViewDetached|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView|\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerView|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic */
    public mixed $record;

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
        return ['record'];
    }

    public static function new(
        ViewRecord|ViewNotFound|ViewBlocked|ViewDetached|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView|\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerView|\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic $record,
    ): self {
        $instance = new self();
        $instance->record = $record;

        return $instance;
    }
}
