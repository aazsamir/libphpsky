<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollows;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getFollows';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $subject;
    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> */
    public array $follows = [];

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
        return ['subject', 'follows'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView> $follows
     */
    public static function new(
        array $follows,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $subject = null,
        ?string $cursor = null,
    ): self {
        $instance = new self();
        $instance->follows = $follows;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
