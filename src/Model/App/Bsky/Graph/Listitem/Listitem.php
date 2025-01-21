<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Listitem;

/**
 * object
 */
class Listitem implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.listitem';

    /** @var string The account which is included on the list. */
    public string $subject;

    /** @var string Reference (AT-URI) to the list record (app.bsky.graph.list). */
    public string $list;
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
        return ['subject', 'list', 'createdAt'];
    }

    public static function new(string $subject, string $list, \DateTimeInterface $createdAt): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->list = $list;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
