<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Graph\Subscription;

/**
 * object
 */
class Subscription implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'site.standard.graph.subscription';

    public ?\DateTimeInterface $createdAt;

    /** @var string AT-URI reference to the publication record being subscribed to (ex: at://did:plc:abc123/site.standard.publication/xyz789). */
    public string $publication;

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
        return ['publication'];
    }

    public static function new(string $publication, ?\DateTimeInterface $createdAt = null): self
    {
        $instance = new self();
        $instance->publication = $publication;
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }

        return $instance;
    }
}
