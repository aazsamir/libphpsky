<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\ListRepos;

/**
 * object
 */
class Repo implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repo';
    public const ID = 'com.atproto.sync.listRepos';

    public string $did;
    public string $head;
    public string $rev;
    public ?bool $active = null;
    public ?string $status = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $did,
        string $head,
        string $rev,
        ?bool $active = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->head = $head;
        $instance->rev = $rev;
        $instance->active = $active;
        $instance->status = $status;

        return $instance;
    }
}
