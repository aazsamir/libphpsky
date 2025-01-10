<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $repo;
    public ?bool $validate = null;

    /** @var mixed[] */
    public array $writes = [];
    public ?string $swapCommit = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $writes
     */
    public static function new(string $repo, array $writes, ?bool $validate = null, ?string $swapCommit = null): self
    {
        $instance = new self();
        $instance->repo = $repo;
        $instance->writes = $writes;
        $instance->validate = $validate;
        $instance->swapCommit = $swapCommit;

        return $instance;
    }
}
