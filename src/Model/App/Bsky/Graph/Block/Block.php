<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Block;

/**
 * object
 */
class Block implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.block';

    /** @var string DID of the account to be blocked. */
    public string $subject;
    public \DateTimeInterface $createdAt;

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
        return ['subject', 'createdAt'];
    }

    public static function new(string $subject, \DateTimeInterface $createdAt): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
