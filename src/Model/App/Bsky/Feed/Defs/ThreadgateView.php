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

    public ?string $uri;
    public ?string $cid;
    public mixed $record;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic>|null */
    public ?array $lists = [];

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
        return [];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic> $lists
     */
    public static function new(
        ?string $uri = null,
        ?string $cid = null,
        mixed $record = null,
        ?array $lists = [],
    ): self {
        $instance = new self();
        if ($uri !== null) {
            $instance->uri = $uri;
        }
        if ($cid !== null) {
            $instance->cid = $cid;
        }
        if ($record !== null) {
            $instance->record = $record;
        }
        if ($lists !== null) {
            $instance->lists = $lists;
        }

        return $instance;
    }
}
