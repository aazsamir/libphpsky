<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadgateView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadgateView';
    public const ID = 'app.bsky.feed.defs';

    public ?string $uri = null;
    public ?string $cid = null;
    public mixed $record = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic>|null */
    public ?array $lists = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic> $lists
     */
    public static function new(
        ?string $uri = null,
        ?string $cid = null,
        mixed $record = null,
        ?array $lists = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->record = $record;
        $instance->lists = $lists;

        return $instance;
    }
}
