<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\ListRepos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listRepos';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\ListRepos\Repo[] */
    public array $repos = [];

    public static function id(): string
    {
        return self::ID;
    }
}
