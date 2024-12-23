<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\DescribeRepo;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.describeRepo';

    public string $handle;
    public string $did;
    public mixed $didDoc;

    /** @var string[] */
    public array $collections = [];
    public bool $handleIsCorrect;

    public static function id(): string
    {
        return self::ID;
    }
}
