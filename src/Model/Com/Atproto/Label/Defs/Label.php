<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class Label implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'label';
    public const ID = 'com.atproto.label.defs';

    public ?int $ver;
    public string $src;
    public string $uri;
    public ?string $cid;
    public string $val;
    public ?bool $neg;
    public \DateTimeInterface $cts;
    public ?\DateTimeInterface $exp;
    public ?string $sig;

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
        return ['src', 'uri', 'val', 'cts'];
    }

    public static function new(
        string $src,
        string $uri,
        string $val,
        \DateTimeInterface $cts,
        ?int $ver = null,
        ?string $cid = null,
        ?bool $neg = null,
        ?\DateTimeInterface $exp = null,
        ?string $sig = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->uri = $uri;
        $instance->val = $val;
        $instance->cts = $cts;
        if ($ver !== null) {
            $instance->ver = $ver;
        }
        if ($cid !== null) {
            $instance->cid = $cid;
        }
        if ($neg !== null) {
            $instance->neg = $neg;
        }
        if ($exp !== null) {
            $instance->exp = $exp;
        }
        if ($sig !== null) {
            $instance->sig = $sig;
        }

        return $instance;
    }
}
