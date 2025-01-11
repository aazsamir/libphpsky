<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\PutRecord;

/**
 * Write a repository record, creating or updating it as needed. Requires auth, implemented by PDS.
 * procedure
 */
class PutRecord implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.putRecord';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\PutRecord\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
