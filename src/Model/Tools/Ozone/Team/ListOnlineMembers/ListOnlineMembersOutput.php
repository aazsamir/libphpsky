<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListOnlineMembers;

/**
 * object
 */
class ListOnlineMembersOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.team.listOnlineMembers';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListOnlineMembers\OnlineMember> */
    public array $members = [];

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
        return ['members'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\ListOnlineMembers\OnlineMember> $members
     */
    public static function new(array $members): self
    {
        $instance = new self();
        $instance->members = $members;

        return $instance;
    }
}
