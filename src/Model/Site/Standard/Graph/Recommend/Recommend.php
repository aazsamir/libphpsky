<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Graph\Recommend;

/**
 * object
 */
class Recommend implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'site.standard.graph.recommend';

    public \DateTimeInterface $createdAt;

    /** @var string AT-URI reference to the document record being recommended (ex: at://did:plc:abc123/site.standard.document/xyz789). */
    public string $document;

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
        return ['document', 'createdAt'];
    }

    public static function new(\DateTimeInterface $createdAt, string $document): self
    {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->document = $document;

        return $instance;
    }
}
