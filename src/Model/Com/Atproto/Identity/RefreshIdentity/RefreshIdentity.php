<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\RefreshIdentity;

/**
 * Request that the server re-resolve an identity (DID and handle). The server may ignore this request, or require authentication, depending on the role, implementation, and policy of the server.
 * procedure
 */
class RefreshIdentity implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.refreshIdentity';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\Defs\IdentityInfo
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\Defs\IdentityInfo::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
