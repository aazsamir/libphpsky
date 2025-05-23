<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.describeRepo';

    public string $handle;
    public string $did;
    public mixed $didDoc;

    /** @var array<string> List of all the collections (NSIDs) for which this repo contains at least one record. */
    public array $collections = [];

    /** @var bool Indicates if handle is currently valid (resolves bi-directionally) */
    public bool $handleIsCorrect;

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
        return ['handle', 'did', 'didDoc', 'collections', 'handleIsCorrect'];
    }

    /**
     * @param array<string> $collections
     */
    public static function new(
        string $handle,
        string $did,
        mixed $didDoc,
        array $collections,
        bool $handleIsCorrect,
    ): self {
        $instance = new self();
        $instance->handle = $handle;
        $instance->did = $did;
        $instance->didDoc = $didDoc;
        $instance->collections = $collections;
        $instance->handleIsCorrect = $handleIsCorrect;

        return $instance;
    }
}
