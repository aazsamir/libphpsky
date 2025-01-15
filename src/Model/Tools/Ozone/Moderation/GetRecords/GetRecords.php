<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords;

/**
 * Get details about some records.
 * query
 */
class GetRecords implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.getRecords';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $uris
     */
    public function query(array $uris): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRecords\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}