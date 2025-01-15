<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getRepostedBy';

    public string $uri;
    public ?string $cid = null;
    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $repostedBy = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $repostedBy
     */
    public static function new(string $uri, array $repostedBy, ?string $cid = null, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->repostedBy = $repostedBy;
        $instance->cid = $cid;
        $instance->cursor = $cursor;

        return $instance;
    }
}
