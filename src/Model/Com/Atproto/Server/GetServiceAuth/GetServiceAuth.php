<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth;

/**
 * Get a signed token on behalf of the requesting DID for the requested service.
 * query
 */
class GetServiceAuth implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.getServiceAuth';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $aud The DID of the service that the token will be used to authenticate with
     * @param ?int $exp The time in Unix Epoch seconds that the JWT expires. Defaults to 60 seconds in the future. The service may enforce certain time bounds on tokens depending on the requested scope.
     * @param ?string $lxm Lexicon (XRPC) method to bind the requested token to
     */
    public function query(string $aud, ?int $exp = null, ?string $lxm = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $aud The DID of the service that the token will be used to authenticate with
     * @param ?int $exp The time in Unix Epoch seconds that the JWT expires. Defaults to 60 seconds in the future. The service may enforce certain time bounds on tokens depending on the requested scope.
     * @param ?string $lxm Lexicon (XRPC) method to bind the requested token to
     * @return array<string, mixed>
     */
    public function rawQuery(string $aud, ?int $exp = null, ?string $lxm = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
