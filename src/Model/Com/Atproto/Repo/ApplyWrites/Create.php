<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * Operation which creates a new record.
 * object
 */
class Create implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'create';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $collection;

    /** @var ?string NOTE: maxLength is redundant with record-key format. Keeping it temporarily to ensure backwards compatibility. */
    public ?string $rkey;
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
        return ['collection', 'value'];
    }

    public static function new(string $collection, mixed $value, ?string $rkey = null): self
    {
        $instance = new self();
        $instance->collection = $collection;
        $instance->value = $value;
        if ($rkey !== null) {
            $instance->rkey = $rkey;
        }

        return $instance;
    }
}
