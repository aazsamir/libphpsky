<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.getRecord';

    public string $uri;
    public ?string $cid;
    public mixed $value;

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
        return ['uri', 'value'];
    }

    public static function new(string $uri, mixed $value, ?string $cid = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->value = $value;
        if ($cid !== null) {
            $instance->cid = $cid;
        }

        return $instance;
    }
}
