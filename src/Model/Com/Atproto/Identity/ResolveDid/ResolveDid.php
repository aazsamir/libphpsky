<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveDid;

/**
 * Resolves DID to DID document. Does not bi-directionally verify handle.
 * query
 */
class ResolveDid implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.resolveDid';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $did DID to resolve.
     */
    public function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveDid\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $did DID to resolve.
     * @return array<string, mixed>
     */
    public function rawQuery(string $did): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
