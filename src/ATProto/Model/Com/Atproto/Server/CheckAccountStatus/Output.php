<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CheckAccountStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.checkAccountStatus';

    public bool $activated;
    public bool $validDid;
    public string $repoCommit;
    public string $repoRev;
    public int $repoBlocks;
    public int $indexedRecords;
    public int $privateStateValues;
    public int $expectedBlobs;
    public int $importedBlobs;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        bool $activated,
        bool $validDid,
        string $repoCommit,
        string $repoRev,
        int $repoBlocks,
        int $indexedRecords,
        int $privateStateValues,
        int $expectedBlobs,
        int $importedBlobs,
    ): self {
        $instance = new self();
        $instance->activated = $activated;
        $instance->validDid = $validDid;
        $instance->repoCommit = $repoCommit;
        $instance->repoRev = $repoRev;
        $instance->repoBlocks = $repoBlocks;
        $instance->indexedRecords = $indexedRecords;
        $instance->privateStateValues = $privateStateValues;
        $instance->expectedBlobs = $expectedBlobs;
        $instance->importedBlobs = $importedBlobs;

        return $instance;
    }
}
