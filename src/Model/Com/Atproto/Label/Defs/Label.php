<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class Label implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'label';
    public const ID = 'com.atproto.label.defs';

    public ?int $ver = null;
    public string $src;
    public string $uri;
    public ?string $cid = null;
    public string $val;
    public ?bool $neg = null;
    public \DateTimeInterface $cts;
    public ?\DateTimeInterface $exp = null;
    public ?string $sig = null;

    public static function id(): string
    {
        return self::ID;
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
        $instance->ver = $ver;
        $instance->cid = $cid;
        $instance->neg = $neg;
        $instance->exp = $exp;
        $instance->sig = $sig;

        return $instance;
    }
}
