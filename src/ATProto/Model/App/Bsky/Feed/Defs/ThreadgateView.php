<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadgateView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'threadgateView';
    public const ID = 'app.bsky.feed.defs';

    public ?string $uri = null;
    public ?string $cid = null;
    public mixed $record = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListViewBasic[] */
    public ?array $lists = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListViewBasic[] $lists
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
