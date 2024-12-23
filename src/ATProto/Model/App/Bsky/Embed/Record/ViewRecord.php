<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewRecord';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null;
    public mixed $value;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?int $replyCount = null;
    public ?int $repostCount = null;
    public ?int $likeCount = null;
    public ?int $quoteCount = null;

    /** @var mixed[] */
    public ?array $embeds = [];
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
