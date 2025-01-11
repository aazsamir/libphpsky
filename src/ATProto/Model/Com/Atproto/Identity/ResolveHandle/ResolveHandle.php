<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\ResolveHandle;

/**
 * Resolves a handle (domain name) to a DID.
 * query
 */
class ResolveHandle implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.resolveHandle';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $handle): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\ResolveHandle\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
