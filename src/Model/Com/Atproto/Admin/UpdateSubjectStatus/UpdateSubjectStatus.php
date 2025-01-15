<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus;

/**
 * Update the service-specific admin status of a subject (account, record, or blob).
 * procedure
 */
class UpdateSubjectStatus implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.updateSubjectStatus';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateSubjectStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
