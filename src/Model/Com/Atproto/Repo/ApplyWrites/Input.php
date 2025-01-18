<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $repo;
    public ?bool $validate;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Create|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Update|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Delete> */
    public array $writes = [];
    public ?string $swapCommit;

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
        return ['repo', 'writes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Create|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Update|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Delete> $writes
     */
    public static function new(string $repo, array $writes, ?bool $validate = null, ?string $swapCommit = null): self
    {
        $instance = new self();
        $instance->repo = $repo;
        $instance->writes = $writes;
        if ($validate !== null) {
            $instance->validate = $validate;
        }
        if ($swapCommit !== null) {
            $instance->swapCommit = $swapCommit;
        }

        return $instance;
    }
}
