<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\DereferenceScope;

/**
 * Allows finding the oauth permission scope from a reference
 * query
 */
class DereferenceScope implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.dereferenceScope';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $scope The scope reference (starts with 'ref:')
     */
    public function query(string $scope): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\DereferenceScope\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $scope The scope reference (starts with 'ref:')
     * @return array<string, mixed>
     */
    public function rawQuery(string $scope): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
