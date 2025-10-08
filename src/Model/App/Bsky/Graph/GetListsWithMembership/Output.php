<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListsWithMembership;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getListsWithMembership';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListsWithMembership\ListWithMembership> */
    public array $listsWithMembership = [];

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
        return ['listsWithMembership'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListsWithMembership\ListWithMembership> $listsWithMembership
     */
    public static function new(array $listsWithMembership, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->listsWithMembership = $listsWithMembership;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
