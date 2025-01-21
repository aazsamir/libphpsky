<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos;

/**
 * object
 */
class Repo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repo';
    public const ID = 'com.atproto.sync.listRepos';

    public string $did;

    /** @var string Current repo commit CID */
    public string $head;
    public string $rev;
    public ?bool $active;

    /** @var ?string If active=false, this optional field indicates a possible reason for why the account is not active. If active=false and no status is supplied, then the host makes no claim for why the repository is no longer being hosted. */
    public ?string $status;

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
        return ['did', 'head', 'rev'];
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
        if ($active !== null) {
            $instance->active = $active;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
