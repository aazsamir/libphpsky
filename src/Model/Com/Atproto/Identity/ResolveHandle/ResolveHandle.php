<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle;

/**
 * Resolves an atproto handle (hostname) to a DID. Does not necessarily bi-directionally verify against the the DID document.
 * query
 */
class ResolveHandle implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.resolveHandle';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $handle The handle to resolve.
     */
    public function query(string $handle): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
