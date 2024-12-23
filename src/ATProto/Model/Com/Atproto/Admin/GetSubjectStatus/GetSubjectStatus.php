<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetSubjectStatus;

/**
 * Get the service-specific admin status of a subject (account, record, or blob).
 * query
 */
class GetSubjectStatus implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getSubjectStatus';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did, string $uri, string $blob): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetSubjectStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
