<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\DeleteRecord;

/**
 * Delete a repository record, or ensure it doesn't exist. Requires auth, implemented by PDS.
 * procedure
 */
class DeleteRecord implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.deleteRecord';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\DeleteRecord\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
