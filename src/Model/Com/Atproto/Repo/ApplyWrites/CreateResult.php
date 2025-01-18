<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class CreateResult implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'createResult';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $uri;
    public string $cid;
    public ?string $validationStatus;

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
        return ['uri', 'cid'];
    }

    public static function new(string $uri, string $cid, ?string $validationStatus = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        if ($validationStatus !== null) {
            $instance->validationStatus = $validationStatus;
        }

        return $instance;
    }
}
