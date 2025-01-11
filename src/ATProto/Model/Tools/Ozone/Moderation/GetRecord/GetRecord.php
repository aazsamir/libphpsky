<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRecord;

/**
 * Get details about a record.
 * query
 */
class GetRecord implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getRecord';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(
        string $uri,
        ?string $cid = null,
    ): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordViewDetail::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
