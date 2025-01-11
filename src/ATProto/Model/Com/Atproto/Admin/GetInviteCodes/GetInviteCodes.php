<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetInviteCodes;

/**
 * Get an admin view of invite codes.
 * query
 */
class GetInviteCodes implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getInviteCodes';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $sort = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetInviteCodes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
