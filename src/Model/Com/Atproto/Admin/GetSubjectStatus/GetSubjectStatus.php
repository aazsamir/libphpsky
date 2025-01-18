<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus;

/**
 * Get the service-specific admin status of a subject (account, record, or blob).
 * query
 */
class GetSubjectStatus implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getSubjectStatus';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(?string $did = null, ?string $uri = null, ?string $blob = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetSubjectStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
