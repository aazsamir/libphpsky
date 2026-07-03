<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ListJoinRequests;

/**
 * object
 */
class ListJoinRequestsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.group.listJoinRequests';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinRequestView> */
    public array $requests = [];

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
        return ['requests'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinRequestView> $requests
     */
    public static function new(array $requests, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->requests = $requests;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
