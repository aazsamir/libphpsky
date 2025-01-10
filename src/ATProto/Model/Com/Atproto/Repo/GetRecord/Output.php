<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\GetRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.getRecord';

    public string $uri;
    public ?string $cid = null;
    public mixed $value;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, mixed $value, ?string $cid = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->value = $value;
        $instance->cid = $cid;

        return $instance;
    }
}
