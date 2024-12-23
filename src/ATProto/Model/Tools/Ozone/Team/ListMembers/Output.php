<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\ListMembers;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.team.listMembers';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs\Member[] */
    public array $members = [];

    public static function id(): string
    {
        return self::ID;
    }
}
