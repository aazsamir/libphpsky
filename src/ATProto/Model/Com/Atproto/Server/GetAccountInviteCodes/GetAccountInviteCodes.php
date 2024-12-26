<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetAccountInviteCodes;

/**
 * Get all invite codes for the current account. Requires auth.
 * query
 */
class GetAccountInviteCodes implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.getAccountInviteCodes';

    public static function id(): string
    {
        return self::ID;
    }

    function query(?bool $includeUsed = null, ?bool $createAvailable = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetAccountInviteCodes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
