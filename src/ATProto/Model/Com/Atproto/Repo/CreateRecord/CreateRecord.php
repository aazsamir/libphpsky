<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\CreateRecord;

/**
 * Create a single new repository record. Requires auth, implemented by PDS.
 * procedure
 */
class CreateRecord implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.createRecord';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\CreateRecord\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
