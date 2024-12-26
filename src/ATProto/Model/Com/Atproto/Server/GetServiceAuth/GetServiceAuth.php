<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetServiceAuth;

/**
 * Get a signed token on behalf of the requesting DID for the requested service.
 * query
 */
class GetServiceAuth implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.getServiceAuth';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $aud, ?int $exp = null, ?string $lxm = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetServiceAuth\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
