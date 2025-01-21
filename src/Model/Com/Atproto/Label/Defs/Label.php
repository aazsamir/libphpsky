<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * Metadata tag on an atproto resource (eg, repo or record).
 * object
 */
class Label implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'label';
    public const ID = 'com.atproto.label.defs';

    /** @var ?int The AT Protocol version of the label object. */
    public ?int $ver;

    /** @var string DID of the actor who created this label. */
    public string $src;

    /** @var string AT URI of the record, repository (account), or other resource that this label applies to. */
    public string $uri;

    /** @var ?string Optionally, CID specifying the specific version of 'uri' resource this label applies to. */
    public ?string $cid;

    /** @var string The short string name of the value or type of this label. */
    public string $val;

    /** @var ?bool If true, this is a negation label, overwriting a previous label. */
    public ?bool $neg;

    /** @var \DateTimeInterface Timestamp when this label was created. */
    public \DateTimeInterface $cts;

    /** @var ?\DateTimeInterface Timestamp at which this label expires (no longer applies). */
    public ?\DateTimeInterface $exp;

    /** @var ?string Signature of dag-cbor encoded label. */
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
