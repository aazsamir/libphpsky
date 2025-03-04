<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveIdentity;

/**
 * Resolves an identity (DID or Handle) to a full identity (DID document and verified handle).
 * query
 */
class ResolveIdentity implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.resolveIdentity';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $identifier Handle or DID to resolve.
     */
    public function query(string $identifier): \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\Defs\IdentityInfo
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\Defs\IdentityInfo::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $identifier Handle or DID to resolve.
     * @return array<string, mixed>
     */
    public function rawQuery(string $identifier): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
