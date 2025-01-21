<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes;

/**
 * Get all invite codes for the current account. Requires auth.
 * query
 */
class GetAccountInviteCodes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.getAccountInviteCodes';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?bool $createAvailable Controls whether any new 'earned' but not 'created' invites should be created.
     */
    public function query(?bool $includeUsed = null, ?bool $createAvailable = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetAccountInviteCodes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
