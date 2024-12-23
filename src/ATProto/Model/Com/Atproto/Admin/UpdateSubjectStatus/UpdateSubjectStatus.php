<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\UpdateSubjectStatus;

/**
 * Update the service-specific admin status of a subject (account, record, or blob).
 * procedure
 */
class UpdateSubjectStatus implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.updateSubjectStatus';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\UpdateSubjectStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
